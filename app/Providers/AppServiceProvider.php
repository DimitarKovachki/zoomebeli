<?php

namespace App\Providers;

use App\Zoomebeli\Cart;
use App\Zoomebeli\CartItem;
use App\Zoomebeli\CookieDecrypter;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CookieDecrypter $decrypter)
    {
        $cart_arr = json_encode([]);
        $cookie = request()->cookie('cart');
        if ($cookie) {

            $cart_arr = $decrypter->public_decryptCookie('cart', $cookie);
        }
        $defaultShippingType = false;
        $cart = new Cart();
        $cart->shippingType = $defaultShippingType;
        $cart_arr = json_decode($cart_arr, 1);
        foreach ($cart_arr as $key => $cart_arr_item) {
            $helper_arr = CartItem::helperToGetTheValuesForTheConstructor($cart_arr_item);

            $cart->addItem(new CartItem($helper_arr['product_id'], $helper_arr['option_ids'], $helper_arr['size'], $helper_arr['note']), $key);
        }


        View::share('cart', $cart);
    }
}
