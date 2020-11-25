<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProductController;
//admin panel routes

Route::get('/' , 'PanelController@index')->name('panel')->middleware('verified')->middleware(CheckAdmin::class);

Route::resource('products', 'ProductController')->except('show')->middleware('verified')->middleware(CheckAdmin::class);

