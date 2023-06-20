<?php

namespace App\Zoomebeli;

use App\Zoomebeli\ShippingProviders\Ekont;

class Cart
{
    const FREE_SHIPPING_THRESHOLD = 100000;
    public $cart_items;
    public function __construct()
    {
        $this->cart_items = [];
        $this->shippingType = 'address';
    }

    public function addItem(CartItem $cart_item, $key = false)
    {
        if ($key) {

            $this->cart_items[$key] = $cart_item;
        } else {

            $this->cart_items[] = $cart_item;
        }
    }
    public function totalProducts()
    {
        $total = 0;
        foreach ($this->cart_items as $key => $cart_item) {
            $total += $cart_item->product_variation->price();
        }

        return $total;
    }
    public function totalWeight()
    {
        $total = 0;
        foreach ($this->cart_items as $key => $cart_item) {
            $total += $cart_item->product_variation->weight;
        }

        return $total;
    }
    public function shippingPrice($shipping_type = false)
    {
        $shipping_type = $shipping_type ? $shipping_type : $this->shippingType;

        if(!$shipping_type ){
            return 0;
        }

        if ($this->totalProducts() >= self::FREE_SHIPPING_THRESHOLD) {
            return 0;
        } else {
            //TODO: make it different whether the shipping is to office or to address
            $weight = $this->totalWeight();
            // $shipping_type = 'office';
            return Ekont::getPriceForWeight($weight, $shipping_type,  $this->totalProducts());
        }
    }
    public function total()
    {
        return $this->totalProducts() + $this->shippingPrice($this->shippingType);
    }
    public function count()
    {
        return count($this->cart_items);
    }
    public function items()
    {
        return $this->cart_items;
    }
    public function getFreeShippingThreshold()
    {
        return self::FREE_SHIPPING_THRESHOLD;
    }
}
