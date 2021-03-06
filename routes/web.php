<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//web routes

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);

Route::resource('carts', 'CartController')->only(['index']);

Route::patch('products/{product}/carts/{cart}', 'ProductCartController@removeOne')->name('products.carts.removeOne');

Route::resource('orders', 'OrderController')->only(['index', 'create', 'store', 'show']);

Route::resource('orders.payments', 'OrderPaymentController')->only(['create', 'store']);

Route::resource('vue', 'VueController')->only(['index']);

