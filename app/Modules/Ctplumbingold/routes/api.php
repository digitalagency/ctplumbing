<?php

Route::group(['module' => 'Ctplumbing', 'middleware' => ['api'], 'namespace' => 'App\Modules\Ctplumbing\Controllers'], function() {

    Route::resource('ctplumbing', 'CtplumbingController');

});
