<?php

namespace App\Models;

use App\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    protected $table = 'products_variations';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function price()
    {
        return $this->current_price ? $this->current_price : $this->base_price;
    }
}
