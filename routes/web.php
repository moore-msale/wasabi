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
Route::get('/about_us','HomeController@about_us')->name('about_us');

Route::get('/cart', function () {
    return view('pages.cart');
});

Route::get('/order', function () {
    return view('pages.order');
});
Auth::routes();

Route::get('/home', 'HomeController@welcome')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
