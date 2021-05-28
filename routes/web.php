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
    return redirect()->route('home.index');
});

// main
Route::resource('splendid', 'ProductController')->middleware('user_auth');
Route::resource('store', 'StoreController')->middleware('user_auth');
Route::resource('home', 'HomeController');

// products
Route::get('products/{product}','StoreController@show')->name('product.show');
Route::get('showFiltered/{filter}','StoreController@showFiltered')->name('product.showFiltered');
Route::get('myFiltered/{filter}','StoreController@myFiltered')->name('product.myFiltered');
Route::get('my_products/{product}','ProductController@show')->name('my_product.show');
Route::get('editProduct/{product}','ProductController@editProduct')->name('splendid.editProduct');
Route::post('doEditProduct/{product}','ProductController@doEditProduct')->name('splendid.doEditProduct');
Route::delete('products/{product}','ProductController@destroy')->name('product.destroy');
// oders
Route::get('getOrdersSold','OrdersController@getOrdersSold')->name('orders.get');
Route::get('add-to-cart/{id}', 'OrdersController@addToCart');
Route::get('cancel-order/{id}', 'OrdersController@cancelOrder');
Route::get('complete-order/{id}', 'OrdersController@deliveredOrder');
Route::get('pastOrders','OrdersController@sendOrders')->name('splendid.pastOrders');
Route::resource('order', 'OrdersController')->middleware('user_auth');
// auth and profile
Route::get('register','AuthController@register')->name('auth.register');
Route::get('profile','AuthController@getProfile')->name('user.profile')->middleware('user_auth');
Route::get('edit','AuthController@edit')->name('auth.edit');
Route::post('doEdit','AuthController@doEdit')->name('auth.doEdit');
Route::post('doRegister','AuthController@doRegister')->name('auth.doRegister');
Route::get('login','AuthController@login')->name('auth.login');
Route::post('login','AuthController@doLogin')->name('auth.do-login');
Route::any('logout','AuthController@logout')->name('auth.logout');
// purchase
Route::post('purchase', 'OrdersController@purchase')->name('purchase');
Route::get('mycart','ShoppingCartController@getCart')->name('user.cart')->middleware('user_auth');
Route::any('order-purchase/{id}','OrdersController@showPayment')->name('order-purchase')->middleware('user_auth');




