<?php
//use App\Http;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('/usuarios', 'UserController@index')->name('users.index')->middleware('verified');
// Route::get('/usuarios/{user}', 'UserController@show')->name('users.show')->middleware('verified');
// Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit')->middleware('verified');
// Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit')->middleware('verified');
// Route::patch('/usuarios/{InfoUser}', 'UserController@update')->name('users.update')->middleware('verified');
Route::resource('users', 'UserController')->middleware('verified');
