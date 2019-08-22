<?php

Route::group(['module' => 'Review', 'middleware' => ['api'], 'namespace' => 'App\Modules\Review\Controllers'], function() {

    Route::resource('Review', 'ReviewController');

});
