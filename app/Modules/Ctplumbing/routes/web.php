<?php

Route::group(['module' => 'Ctplumbing', 'middleware' => ['web'], 'namespace' => 'App\Modules\Ctplumbing\Controllers'], function() {

    Route::get('/', 'CtplumbingController@index')->name('home');

    
    Route::get('/product/search/result', 'CtplumbingController@searchProduct')->name('search');

    Route::get('about-us', 'CtplumbingController@aboutus');

    Route::get('quick-links', 'CtplumbingController@quicklinks');

    Route::get('newsletter', 'CtplumbingController@newsletter');

    Route::get('contact', 'CtplumbingController@contact')->name('contact');

    Route::post('contact', 'CtplumbingController@Postcontact')->name('contact');

    Route::get('site-map', 'CtplumbingController@sitemap')->name('sitemap');
    
    Route::get("category/{slug}", 'CtplumbingController@category')->name('category.list');

   Route::get('/product/details/{id}', 'CtplumbingController@product_show')->name('product');

   Route::get('product/details/Interested/{id}', 'CtplumbingController@Interested');

   Route::get('product/details/notInterested/{id}', 'CtplumbingController@notInterested');

   Route::get('product/Interested', 'CtplumbingController@Interested_Not_Interested')->name('customer.interested');


    Route::post('rating', 'CtplumbingController@rating')->name('rating');

    //Route::get("category/sortByNewestProduct/{slug}", 'CtplumbingController@sortByNewestProduct');
    Route::get('page/{slug}', 'CtplumbingController@showPage')->name('page');


});
