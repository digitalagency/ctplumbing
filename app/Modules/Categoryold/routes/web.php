<?php

Route::group(['prefix' =>'/admin/category','module' => 'Category', 'middleware' => ['web'], 'namespace' => 'App\Modules\Category\Controllers'], function() {


    Route::get('/', 'CategoryController@index')->name('indexCategory');
    Route::get('create', 'CategoryController@create')->name('createCategory');
    Route::get('edit/{id}', 'CategoryController@edit')->name('editCategory');
    Route::get('view/{id}', 'CategoryController@show')->name('viewCategory');
    Route::post('update/{id}', 'CategoryController@update')->name('updateCategory');
    Route::post('create', 'CategoryController@store')->name('storeCategory');
    Route::get('delete/{id}', 'CategoryController@destroy')->name('deleteCategory');


    Route::get('set/properties/{id}', 'CategoryController@setproperties')->name('setProperty');

    Route::post('add/properties/details', 'CategoryController@addpropertiesdetails')->name('addPropertyDetails');


});
