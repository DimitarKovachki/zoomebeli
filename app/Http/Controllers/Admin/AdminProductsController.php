<?php

namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    public function create(Request $request)
    {
        $categories = Category::all();
        $attributes = Attribute::all();
        return view('admin.products.create', compact('attributes', 'categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'base_price' => 'required'
        ]);
        $product = new Product();
        $product->title = $request->get('title');
        $product->description = $request->get('description');
        $product->save();

        $product->categories()->sync($request->get('categories'));

        $attributes = $request->get('attribute');
        foreach ($attributes as $key => $attribute_id) {
            if (!$attribute_id) continue;

            DB::table('products_attributes')->insert([
                'product_id' => $product->id,
                'attribute_id' => $attribute_id,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ]);
        }
        $products_sizes = $request->get('size');
        foreach ($products_sizes as $key => $size) {
            if (!$size) continue;
            $base_price = $request->input('base_price.' . $key);
            $weight = $request->input('weight.' . $key);

            DB::table('products_variations')->insert([
                'product_id' => $product->id,
                'size' => $size,
                'current_price' => $base_price,
                'base_price' => $base_price,
                'weight' => $weight,
                'created_at' => DB::raw('NOW()'),
                'updated_at' => DB::raw('NOW()'),
            ]);
        }



        $images = $request->file('image');
        if ($images) {
            foreach (array_values($images) as $key => $image) {
                $extension = $image->extension();
                $filename = date('YmdHis') . uniqid() . $image->getClientOriginalName();
                $image->storePubliclyAs(ProductImage::STORAGE_DIR, $filename);
                $url = Storage::url(ProductImage::STORAGE_DIR . $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $url,
                    'is_main' => !$key ? 1 : 0
                ]);
            }
        }
        return redirect()->back();
    }

    public function index()
    {
        $products = Product::with('categories', 'attributes', 'images')->get();
        return $products;
    }
    public function show(Request $request)
    {
    }
}
