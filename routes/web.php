<?php

use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StarterController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/category/{slug}', [CategoriesController::class, 'bySlug']);

Route::get('/products', [ProductsController::class, 'index']);
Route::get('/products/getProductInfoBySize', [ProductsController::class, 'getProductInfoBySize']);
Route::get('/products/{id}', [ProductsController::class, 'show']);
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/checkout/getShippingMethodHtml', [CheckoutController::class, 'getShippingMethodHtml']);
Route::post('/checkout/submitOrder', [CheckoutController::class, 'submitOrder']);


Route::get('/checkout/successOrder', [CheckoutController::class, 'successOrder']);

Route::post('/cart/{id}', [CartController::class, 'add']);
Route::get('/cart/remove/{array_key}', [CartController::class, 'remove']);


Route::get('/', [StarterController::class, 'home']);
Route::get('/gallery', [StarterController::class, 'gallery']);
Route::get('/contact', [StarterController::class, 'contact']);

Route::post('/contact', [StarterController::class, 'sendContact']);

Route::get('/about', [StarterController::class, 'about']);
Route::get('/gallery', [StarterController::class, 'gallery']);
Route::get('/gallery', [StarterController::class, 'gallery']);
Route::get('/custom-furniture', [StarterController::class, 'custom']);
Route::post('/custom-furniture', [StarterController::class, 'sendCustom']);
Route::get('/product-view', [StarterController::class, 'productView']);
Route::get('/terms', [StarterController::class, 'terms']);
Route::get('/faq', [StarterController::class, 'faq']);
Route::get('/delivery', [StarterController::class, 'delivery']);
Route::get('/warranty', [StarterController::class, 'warranty']);




Route::get('/cart', [StarterController::class, 'cart']);
Route::get('/empty-cart', [StarterController::class, 'emptyCart']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/products/create', [AdminProductsController::class, 'create'])
    ->middleware(['auth']);
Route::post('/admin/products', [AdminProductsController::class, 'store'])
    ->middleware(['auth']);
Route::get('/admin/products', [AdminProductsController::class, 'index'])
    ->middleware(['auth']);
Route::get('/admin/orders', [AdminOrdersController::class, 'index'])
    ->middleware(['auth']);


// require __DIR__ . '/auth.php';
