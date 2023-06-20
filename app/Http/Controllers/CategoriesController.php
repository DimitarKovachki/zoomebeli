<?php

namespace App\Http\Controllers;

use App\Category;
use App\Models\ProductVariation;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function bySlug($slug, Request $request)
    {
        
        $category = Category::where('slug', $slug)->firstOrFail();
        $subcategories = Category::where('parent_id', $category->id)->get();
        $topOrders = Product::with('categories')
        ->with(['variations' => function ($q) {
            return $q->orderBy('base_price', 'asc');
        }])
        ->with(['images' => function ($q) {
            $q->orderBy('is_main', 'desc');
        }])
        ->whereIn('id', [5,12,3,10])
        ->get();

        if ($subcategories->isEmpty() && $category->parent_id ) {
            $parentCat = Category::find($category->parent_id);
            $products = Product::with('categories')
                ->whereHas('categories', function ($q) use ($category) {
                    $q->where('categories.id', $category->id);
                })
                ->with(['variations' => function ($q) {
                    return $q->orderBy('base_price', 'asc');
                }])
                ->with(['images' => function ($q) {
                    $q->orderBy('is_main', 'desc');
                }])
                ->get();
                if($products->isEmpty() ){
                    $category = false;
                    $products = Product::with('categories')
                    ->with(['variations' => function ($q) {
                        return $q->orderBy('base_price', 'asc');
                    }])
                    ->with(['images' => function ($q) {
                        $q->orderBy('is_main', 'desc');
                    }])
                    ->get();
                }
            return view('products.index', compact('products', 'category','topOrders', 'parentCat'));
        }
        else {
            return view('category.index', compact('subcategories', 'category','topOrders'));
        }
    }
}
