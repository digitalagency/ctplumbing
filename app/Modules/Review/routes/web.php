<?php

Route::group(['module' => 'Review', 'middleware' => ['web'], 'namespace' => 'App\Modules\Review\Controllers'], function() {

    Route::resource('Review', 'ReviewController');

    Route::post('rating', 'ReviewController@rating')->name('rating');
    
    Route::post('product/details/{id}', 'ReviewController@store')->name('storeReview');



});
