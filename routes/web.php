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

Route::resource('splendid', 'ProductController')->middleware('user_auth');
Route::resource('store', 'StoreController')->middleware('user_auth');
Route::resource('home', 'HomeController');
Route::resource('order', 'OrdersController')->middleware('user_auth');

Route::get('products/{product}','StoreController@show')->name('product.show');
Route::get('my_products/{product}','ProductController@show')->name('my_product.show');
<<<<<<< HEAD
<<<<<<< HEAD
Route::delete('products/{product}','ProductController@destroy')->name('product.destroy');
=======
>>>>>>> parent of 7d5ca85... Merge pull request #1 from RosiMiranda/orders-view
=======
Route::get('editProduct/{product}','ProductController@editProduct')->name('splendid.editProduct');
Route::post('doEditProduct/{product}','ProductController@doEditProduct')->name('splendid.doEditProduct');

>>>>>>> 7d5ca85c12edbc3767358828abb94672290f33e4
Route::get('register','AuthController@register')->name('auth.register');
Route::get('profile','AuthController@getProfile')->name('user.profile')->middleware('user_auth');;
Route::get('edit','AuthController@edit')->name('auth.edit');
Route::post('doEdit','AuthController@doEdit')->name('auth.doEdit');
Route::get('mycart','ShoppingCartController@getCart')->name('user.cart')->middleware('user_auth');;
Route::post('doRegister','AuthController@doRegister')->name('auth.doRegister');
Route::get('login','AuthController@login')->name('auth.login');
Route::post('login','AuthController@doLogin')->name('auth.do-login');
Route::any('logout','AuthController@logout')->name('auth.logout');
// oders
Route::get('getOrdersSold','OrdersController@getOrdersSold')->name('orders.get');


