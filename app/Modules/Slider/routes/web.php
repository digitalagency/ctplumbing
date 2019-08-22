<?php

Route::group(['prefix' =>'admin/slider','module' => 'Slider', 'middleware' => ['web'], 'namespace' => 'App\Modules\Slider\Controllers'], function() {

    
    Route::get('/', 'SliderController@index')->name('indexSlider');
    Route::get('create', 'SliderController@create')->name('createSlider');
    Route::get('edit/{id}', 'SliderController@edit')->name('editSlider');
    Route::get('view/{id}', 'SliderController@show')->name('viewSlider');
    Route::post('update/{id}', 'SliderController@update')->name('updateSlider');
    Route::post('create', 'SliderController@store')->name('storeSlider');
    Route::get('delete/{id}', 'SliderController@destroy')->name('deleteSlider');

});
