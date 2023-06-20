<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function productVariations()
    {
        return $this->belongsToMany(ProductVariation::class, 'orders_products', 'id', 'product_variation_id');
    }
}
