<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutMailable;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderProductOption;
use App\Product;
use App\Zoomebeli\Cart;
use App\Zoomebeli\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function index(Request $request)
    {
        return view('checkout.index');
    }
    public function getShippingMethodHtml(Request $request)
    {
        $cart = $this->getCart($request);
        return [
            'table_final_price' => view('checkout.product_table_final_price', [
                'cart' => $cart
            ])->render(),
            'table' => view('checkout.product_table_shipping_price', [
                'cart' => $cart
            ])->render(),
            'pricing_sidemenu' => view('checkout.pricing_sidemenu', [
                'cart' => $cart
            ])->render(),
        ];
    }

    public function submitOrder(Request $request)
    {
        $this->validate($request, [
            'shipping_method' => 'required',
            'office_full_name' => 'required_if:shipping_method,office',
            'office_email' => 'required_if:shipping_method,office',
            'office_phone' => 'required_if:shipping_method,office',
            'office_city' => 'required_if:shipping_method,office',
            'office_office' => 'required_if:shipping_method,office',

            'address_full_name' => 'required_if:shipping_method,address',
            'address_email' => 'required_if:shipping_method,address',
            'address_phone' => 'required_if:shipping_method,address',
            'address_city' => 'required_if:shipping_method,address',
            'address_address' => 'required_if:shipping_method,address',
        ],
        [   
            'office_full_name.*' => 'Моля въведете имена за доставка',
            'office_email.*' => 'Моля въведете имейл',
            'office_phone.*' => 'Моля въведете телефон за доставка',
            'office_city.*' => 'Моля въведете адрес за доставка',
            'office_office.*' => 'Моля въведете офис за доставка',

            
            'shipping_method.*' => 'Моля въведете опция за доставка',
            'address_full_name.*' => 'Моля въведете имена за доставка',
            'address_email.*' => 'Моля въведете имейл',
            'address_phone.*' => 'Моля въведете телефон за доставка',
            'address_city.*' => 'Моля въведете адрес за доставка',
            'address_address.*' => 'Моля въведете пълен адрес за доставка',
            
            'shipping_method' => 'Моля въведете опция за доставка'
        ]);

        $cart = $this->getCart($request);
        $order = new Order();
        if ($request->get('shipping_method') == 'office') {
            $order->client_name = $request->get('office_full_name');
            $order->city = $request->get('office_city');
            $order->email = $request->get('office_email');
            $order->to_office = 1;
            $order->office_address = $request->get('office_office');
            $order->phone = $request->get('office_phone');
        } else {
            $order->client_name = $request->get('address_full_name');
            $order->city = $request->get('address_city');
            $order->email = $request->get('address_email');
            $order->to_office = 0;
            $order->personal_address = $request->get('address_address');
            $order->phone = $request->get('address_phone');
        }
        $order->ip = $request->ip();
        $order->shipping_cost = $cart->shippingPrice($request->get('shipping_method'));
        $order->total = $cart->total();
        $order->note = $request->get('note');
        $order->save();

        foreach ($cart->items() as $key => $cart_item) {
            $order_product = new OrderProduct();
            $order_product->product_id = $cart_item->product->id;
            $order_product->product_variation_id = $cart_item->product_variation->id;
            $order_product->note = $cart_item->note;
            $order_product->order_id = $order->id;
            $order_product->order_id = $order->id;
            $order_product->save();
            foreach ($cart_item->options as $key => $option) {
                $order_product_option = new OrderProductOption();
                $order_product_option->order_product_id = $order_product->id;
                $order_product_option->attribute_option_id = $option->id;
                $order_product_option->save();
            }
        }


        // return $order; 
        // return $cart->items();


        //removes all cart items after checkout
        Mail::to($order->email)->send(new CheckoutMailable($order, $cart->items(), 'user'));
        Mail::to('zoomebeli@gmail.com')->send(new CheckoutMailable($order, $cart->items(), 'admin'));
        
        Cookie::queue(Cookie::forget('cart'));
        
        return redirect('/checkout/successOrder');

    }
     
    public function successOrder() {
        
        return view('checkout.success');
    }

    private function getCart(Request $request): Cart
    {
        $cart_json = $request->cookie('cart');
        $cart = new Cart();
        $cart_arr = json_decode($cart_json, 1);
        foreach ($cart_arr as $key => $cart_arr_item) {
            $helper_arr = CartItem::helperToGetTheValuesForTheConstructor($cart_arr_item);

            $cart->addItem(new CartItem($helper_arr['product_id'], $helper_arr['option_ids'], $helper_arr['size'], $helper_arr['note']), $key);
        }
        $cart->shippingType = $request->get('shipping_method');
        return $cart;
    }
}
