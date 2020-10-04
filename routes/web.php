<?php
//use App\Http;

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('users', 'UserController')->middleware('verified')->middleware(CheckAdmin::class);

Route::resource('products', 'ProductController')->except('show')->middleware('verified')->middleware(CheckAdmin::class);

Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);

Route::resource('carts', 'CartController')->only(['index']);

Route::get('products/{product}', 'ProductController@show')->name('products.show')->middleware('verified');

Route::patch('products/{product}/carts/{cart}', 'ProductCartController@removeOne')->name('products.carts.removeOne');

Route::resource('orders', 'OrderController')->only(['create', 'store']);

Route::resource('orders.payments', 'OrderPaymentController')->only(['create', 'store']);
