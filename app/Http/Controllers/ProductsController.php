<?php

namespace App\Http\Controllers;

use App\Models\ProductVariation;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('categories')
            ->with(['variations' => function ($q) {
                return $q->orderBy('base_price', 'asc');
            }])
            ->with(['images' => function ($q) {
                $q->orderBy('is_main', 'desc');
            }])
            ->get();

        $topOrders = Product::with('categories')
        ->with(['variations' => function ($q) {
            return $q->orderBy('base_price', 'asc');
        }])
        ->with(['images' => function ($q) {
            $q->orderBy('is_main', 'desc');
        }])
        ->whereIn('id', [1,3,5,7])
        ->get();

        return view('products.index', compact('products', 'topOrders'));
    }

    public function show($product_id, Request $request)
    {
        $product = Product::whereId($product_id)
            ->with('categories')
            ->with(['variations' => function ($q) {
                return $q->orderBy('base_price', 'asc');
            }])
            ->with(['images' => function ($q) {
                $q->orderBy('is_main', 'desc');
            }])
            ->with(['attributes' => function ($q) {
                return $q->with('options');
            }])
            ->first();
        // return $product;
        $topOrders = Product::with('categories')
                    ->with(['variations' => function ($q) {
                        return $q->orderBy('base_price', 'asc');
                    }])
                    ->with(['images' => function ($q) {
                        $q->orderBy('is_main', 'desc');
                    }])
                    ->whereIn('id', [5,12,3,10])
                    ->get();

        return view('products.show', compact('product', 'topOrders'));
    }
    public function getProductInfoBySize(Request $request)
    {
        //TODO:some validatio needed here
        $variation = ProductVariation::where('product_id', $request->product_id)
            ->where('size', $request->get('size'))->get()->first();
        return [
            'bigPriceHtml' => view('products.bigPrice', ['price' => $variation->price()])->render(),
            'weight' => $variation->weight,
        ];
    }
    public function topOrders(Request $request)
    {
        $products = Product::with('categories')
            ->with(['variations' => function ($q) {
                return $q->orderBy('base_price', 'asc');
            }])
            ->with(['images' => function ($q) {
                $q->orderBy('is_main', 'desc');
            }])
            ->get();
        return view('layouts.top-orders', compact('products'));
    }
}
