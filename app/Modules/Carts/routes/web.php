<?php

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
Route::group(['module' => 'Carts', 'middleware' => ['web'], 'namespace' => 'App\Modules\Carts\Controllers'], function () {
    Route::get('add/to/cart', 'CartsController@addToCart')->name('add.to.cart');
    Route::post('add/to/cart', 'CartsController@addToCart')->name('add.to.cart');
    Route::get('cart', 'CartsController@cart')->name('cart.list');
    Route::get('cart/data', 'CartsController@getCartList')->name('cart.data');

    Route::get('cart/total', 'CartsController@getGrandTotal')->name('cart.total');

    Route::get('cart/remove', 'CartsController@remove')->name('cart.remove');
    Route::get('cart/checkout', 'CartsController@checkout')->name('cart.checkout');


Route::post('/payments', 'PaypalPaymentController@store')->name('payments');
Route::get('/callback', 'PaypalPaymentController@callback');
});
