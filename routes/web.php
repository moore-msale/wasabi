<?php

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

Route::get('/', 'HomeController@index');

Route::get('/catalog','ProductController@index')->name('catalog');
Route::post('/catalog_filter','ProductController@filter')->name('catalog_filter');
Route::get('/about_us','HomeController@about_us')->name('about_us');

Route::get('/carter', function () {
    return view('pages.cart');
});

Route::get('/order', function () {
    return view('pages.order');
});

Route::get('/test', function () {
    return view('pages.test');
});

Auth::routes();

Route::get('/home', 'HomeController@welcome')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::post('/liked', 'ProductController@liked')->name('liked');
Route::post('/unliked', 'ProductController@unliked')->name('unliked');



Route::get('/cart', 'Api\CartController@index')->name('cart.index');
Route::get('/cart/checkout', 'Api\CartController@checkout')->name('cart.checkout');
Route::post('/cart', 'Api\CartController@store')->name('cart.store');
Route::get('/cart/add/product', 'Api\CartController@add')->name('cart.add');
Route::get('/cart/delete/product', 'Api\CartController@delete')->name('cart.delete');
Route::get('/cart/remove/product', 'Api\CartController@remove')->name('cart.remove');