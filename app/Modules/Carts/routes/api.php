<?php

Route::group(['module' => 'Carts', 'middleware' => ['api'], 'namespace' => 'App\Modules\Carts\Controllers'], function() {

    Route::resource('Carts', 'CartsController');

});
