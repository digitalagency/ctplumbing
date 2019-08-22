<?php

Route::group(['module' => 'Property', 'middleware' => ['api'], 'namespace' => 'App\Modules\Property\Controllers'], function() {

    Route::resource('Property', 'PropertyController');

});
