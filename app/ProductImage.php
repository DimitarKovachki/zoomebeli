<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    const STORAGE_DIR = 'public/img/products/uploaded/';
    protected $table = 'products_images';
    protected $guarded = [];
}
