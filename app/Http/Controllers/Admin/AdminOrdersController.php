<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminOrdersController extends Controller
{
    public function index()
    {
        return Order::with('productVariations')->get();
    }
    public function show(Request $request)
    {
    }
}
