<?php

namespace App\Http\Controllers;

use App\Product;
use App\Zoomebeli\Cart;
use App\Zoomebeli\CartItem;
use App\Zoomebeli\CookieCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //2 * 7 * 24 * 60 - two weeks
    const COOKIE_TIME_CART = 20160;

    public function add($id, Request $request)
    {
        $current_cart_arr = CookieCart::get();
        // TOOD: this should be the check whether to add to the array or to increase qty
        // issue is that the items could have notes and this could be a variation


        // TODO: the color is gotten through attributes array and the product variation - by a simple value - BAAAD, should be fixed
        $attributes = [];
        foreach ($request->get('attributes') as $key => $option_arr) {
            $attributes[] = [
                'attribute_id' => array_keys($option_arr)[0],
                'option_id' => array_values($option_arr)[0]
            ];
        }

        $size = $request->get('size');

        //add the justadded item to the arr
        $newCartItemFromCookie =  [
            'product_id' => $id,
            'quantity' => 1,
            'attributes' => $attributes,
            'size' => $size,
            'note' => $request->get('note')
        ];
        $current_cart_arr[] = $newCartItemFromCookie;

        $cart = new Cart();
        foreach ($current_cart_arr as $key => $cart_arr_item) {
            $helper_arr = CartItem::helperToGetTheValuesForTheConstructor($cart_arr_item);
            $cart->addItem(new CartItem($helper_arr['product_id'], $helper_arr['option_ids'], $helper_arr['size'], $helper_arr['note']), $key);
        }

        $newCartItemHelperArr = CartItem::helperToGetTheValuesForTheConstructor($newCartItemFromCookie);
        $newCartItem = new CartItem($newCartItemHelperArr['product_id'], $newCartItemHelperArr['option_ids'], $newCartItemHelperArr['size'], $newCartItemHelperArr['note']);


        $value = json_encode($current_cart_arr);
        $cookie = cookie('cart', $value, self::COOKIE_TIME_CART);

        return response([
            'top_mini_cart' => view('cart.top-mini-cart', [
                'cart' => $cart
            ])
            ->render(),
            'modal' => view('layouts.add_modal_cart', [
                'cartItem' => $newCartItem
                ])
            ->render()
        ])->cookie($cookie);
    }

    //TODO: FIX THIs
    //removing cart item by it's key in an array is probably pretty dumb thing to do so fix tihs

    public function remove($array_key, Request $request)
    {
        $current_cart_arr = CookieCart::get();
        unset($current_cart_arr[$array_key]);

        $value = json_encode($current_cart_arr);
        $cookie = cookie('cart', $value, self::COOKIE_TIME_CART);


        return redirect()->back()->cookie($cookie);
    }
}
