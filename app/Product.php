<?php

namespace App;

use App\Models\ProductVariation;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'products_attributes')->with('options');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }
    public function defaultVariation()
    {
        return $this->variations->sortBy('current_price')->first();
    }
    public function minPrice()
    {
        return $this->variations->min('base_price');
    }
    public function maxPrice()
    {
        return $this->variations->max('base_price');
    }
}
