<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ProductsController;


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

Route::get('/home', function () {
    return view('index');
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('index');
});
Route::get('/', [ShoppingCartController::class, 'hiquipviewindex'])->name('index');

Route::get('/home', function () {
    return view('index');
})->name('home');


Route::get('/shop', [ShoppingCartController::class, 'hiquipview'])->name('shop');
Route::get('/product/{id}', [ShoppingCartController::class, 'hiquipview_product'])->name('shop.product');
Route::get('/add_to_cart/{product}/', [ShoppingCartController::class, 'add_to_cart'])->name('cart.add');

Route::get('/cart', function () {
    return view('cart.cart');
});

Route::get('/checkout', function () {
    return view('cart.checkout');
});

//ADMIN CONTROLLER
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/create', [ProductsController::class, 'index']);
Route::get('/admin/datatables', [ProductsController::class, 'datatables']);
Route::get('/admin/datatables/orders', [ProductsController::class, 'orders']);
Route::get('/admin/datatables/users', [ProductsController::class, 'users']);

Route::get('/admin/create',[App\Http\Controllers\ProductsController::class, 'create']);
Route::post('/admin', [App\Http\Controllers\ProductsController::class, 'store']);


Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

