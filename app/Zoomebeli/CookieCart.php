<?php

namespace App\Zoomebeli;

use Illuminate\Support\Facades\Request;

class CookieCart
{

    public static function get()
    {
        $current_cart_json = Request::cookie('cart');
        return $current_cart_json ? json_decode($current_cart_json, 1) : [];
    }
}
