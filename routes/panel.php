<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProductController;
//admin panel routes

Route::group(['middleware' => ['role:admin']], function(){

    Route::get('/' , 'PanelController@index')->name('panel');

    Route::get('products/export/', 'ProductController@export')->name('products.export');

    Route::post('products/import/', 'ProductController@import')->name('products.import');

    Route::resource('products', 'ProductController');

    Route::resource('users', 'UserController');
});



