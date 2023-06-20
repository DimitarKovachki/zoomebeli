<?php

namespace App\Zoomebeli;

use App\AttributeOption;
use App\Models\ProductVariation;
use App\Product;
use Attribute;

class CartItem
{
    // TODO: Size shouldn't be a parameter!!
    public function __construct(int $product_id,  array $option_ids, $size, $note)
    {
        $this->product = Product::with('images')->whereId($product_id)->first();

        $this->size = $size;
        $this->note = $note;
        $this->product_variation = ProductVariation::where('product_id', $this->product->id)->where('size', $size)->first();
        $this->options = AttributeOption::with('attribute')->whereIn('id', $option_ids)->get();
        // dd($this->product_variation);
    }

    public static function helperToGetTheValuesForTheConstructor($cart_arr)
    {

        $option_ids = [];
        foreach ($cart_arr['attributes'] as $key => $arr) {
            $option_ids[] = $arr['option_id'];
        }
        return [
            'option_ids' => $option_ids,
            'product_id' => $cart_arr['product_id'],
            'size' => $cart_arr['size'],
            'note' => $cart_arr['note']
        ];
    }
}
