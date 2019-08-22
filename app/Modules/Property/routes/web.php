<?php

Route::group(['prefix' =>'/admin/property','module' => 'Property', 'middleware' => ['web'], 'namespace' => 'App\Modules\Property\Controllers'], function() {


    Route::get('/', 'PropertyController@index')->name('indexProperty');
    Route::get('create', 'PropertyController@create')->name('createProperty');
    Route::get('edit/{id}', 'PropertyController@edit')->name('editProperty');
    Route::get('view/{id}', 'PropertyController@show')->name('viewProperty');
    Route::post('update/{id}', 'PropertyController@update')->name('updateProperty');
    Route::post('create', 'PropertyController@store')->name('storeProperty');
    Route::get('delete/{id}', 'PropertyController@destroy')->name('deleteProperty');

});


