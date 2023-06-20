<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomeImage extends Model
{
    const STORAGE_DIR = 'public/img/products/custome/';
    protected $table = 'products_images';
    protected $guarded = [];
}
