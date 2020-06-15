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

Auth::routes();
Route::group(['middleware'=>'auth'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::prefix('basket')->group(function () {
        Route::get('/cart', 'Site\Basket\BasketController@basket')->name('basket');
        Route::post('/add', 'Site\Basket\BasketController@addBasket')->name('add_basket');
        Route::patch('/update', 'Site\Basket\BasketController@update');
        Route::delete('/remove', 'Site\Basket\BasketController@remove');

    });
});
Route::group(['middleware'=>'admin'], function(){
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'Admin\ProductController@index')->name('admin_home');

        Route::prefix('product')->group(function () {
            Route::get('/add','Admin\ProductController@create')->name('product_create');
            Route::get('/edit/{id}','Admin\ProductController@show');
            Route::get('/delete/{id}','Admin\ProductController@destroy');
            Route::post('/update','Admin\ProductController@update')->name('product_update');
            Route::post('/save','Admin\ProductController@store')->name('product_save');
        });
    });
});
