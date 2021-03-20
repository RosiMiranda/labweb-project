<?php

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

// Oscar commit test

Route::get('/', function () {
    return view('home.index');
});

Route::resource('splendid', 'ProductController');
Route::resource('store', 'StoreController');
Route::resource('home', 'HomeController');

Route::get('products/{product}','StoreController@show')->name('product.show');
Route::get('my_products/{product}','ProductController@show')->name('my_product.show');
Route::get('register','AuthController@register')->name('auth.register');
Route::post('doRegister','AuthController@doRegister')->name('auth.doRegister');
Route::get('login','AuthController@login')->name('auth.login');
Route::post('login','AuthController@doLogin')->name('auth.do-login');
Route::any('logout','AuthController@logout')->name('auth.logout');


