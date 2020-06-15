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
        Route::post('/update', 'Site\Basket\BasketController@update');
        Route::delete('/remove', 'Site\Basket\BasketController@remove');
        Route::get('/checkout1', 'Site\Basket\BasketController@checkout1')->name('checkout1');
    });
    Route::post('/payment','Site\Payment\PaymentController@payment');
    Route::prefix('me')->group(function () {
        Route::get('/address', 'Site\Address\DeliveryAddressController@index')->name('get_address');
        Route::post('/address', 'Site\Address\DeliveryAddressController@addAddress')->name('add_address');
    });
});
Route::group(['middleware'=>'admin'], function(){
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'Admin\ProductController@index')->name('admin_home');
        Route::get('/orders', 'Admin\OrderController@index')->name('orders');
        Route::get('/orders/{id}', 'Admin\OrderController@checkOrder')->name('order_check');

        Route::prefix('product')->group(function () {
            Route::get('/add','Admin\ProductController@create')->name('product_create');
            Route::get('/edit/{id}','Admin\ProductController@show');
            Route::get('/delete/{id}','Admin\ProductController@destroy');
            Route::post('/update','Admin\ProductController@update')->name('product_update');
            Route::post('/save','Admin\ProductController@store')->name('product_save');
        });
    });
});
