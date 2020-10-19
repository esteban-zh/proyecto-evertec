<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//admin panel routes


Route::resource('products', 'ProductController')->except('show');//->middleware('verified');//->middleware(CheckAdmin::class);

