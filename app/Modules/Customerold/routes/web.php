<?php

Route::group(['prefix' =>'customer','module' => 'Customer', 'middleware' => ['web'], 'namespace' => 'App\Modules\Customer\Controllers'], function() {

      //cutomer register

       Route::get("/register", "CustomerRegisterController@customerregister")->name('customer/register');

       Route::post("/register", "CustomerRegisterController@register")->name('register');

       Route::get("/verifyemail/{token}", "CustomerRegisterController@verify");

      //cutomer login
       Route::get('/login', 'CustomerController@customerlogin')->name('customer/login');
       Route::post('/login/verify', 'CustomerController@loginverifyHome')->name('loginverifyHome');;
       Route::get("/logout", "CustomerController@customerLogout")->name('customer/logout');



});



