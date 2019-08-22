<?php

Route::group(['prefix' =>'/admin/partners','module' => 'Partners', 'middleware' => ['web'], 'namespace' => 'App\Modules\Partners\Controllers'], function() {
    Route::get('/', 'PartnersController@index')->name('indexPartners');
    Route::get('create', 'PartnersController@create')->name('createPartners');
    Route::get('edit/{id}', 'PartnersController@edit')->name('editPartners');
    Route::get('view/{id}', 'PartnersController@show')->name('viewPartners');
    Route::post('update/{id}', 'PartnersController@update')->name('updatePartners');
    Route::post('create', 'PartnersController@store')->name('storePartners');
    Route::get('delete/{id}', 'PartnersController@destroy')->name('deletePartners');
});
