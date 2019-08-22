<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Admin login

$this->get('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');


//Route::get('/bathrooms', 'ProductsController@bathroomscategory');
Route::get('/admin/profile/edit', 'AdminController@adminprofile');
Route::post('/admin/profile/edit', 'AdminController@profileupdate');
Route::group(array('prefix' => config('app.ADMIN_URL', 'admin'), 'namespace' => 'Backend', 'middleware' => ['auth']), function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/menu', 'DashboardController@menu')->name('menu.index');
    Route::get('/option', 'OptionController@form')->name('option.index');
    Route::post('/optionsave', 'OptionController@save')->name('option.save');
    Route::resource('page', 'PageController');
    Route::resource('user', 'UserController');
    Route::resource('contact', 'ContactController');
   
    Route::resource('testimonial', 'TestimonialController');
    Route::resource('cmsoption', 'CmsoptionsController');
    Route::get('/searches', 'CmsoptionsController@search')->name('option.search');
    Route::get('/autocomplete', 'CmsoptionsController@group')->name('option.group');

    Route::get('/changeusers', 'UserController@changeuser');
    Route::patch('/modify_Users/{id}', 'UserController@modifyuser_Save')->name('user.modify');
});

Route::get('today', function(Request $res){
if($res->slug){
    $cid = \App\Category::getIdBySlug($res->slug);
    return DB::table('products')->whereDate('created_at', \Carbon\Carbon::today())
    ->whereCategoryId($cid)->count();
}else{
    return DB::table('products')->whereDate('created_at', \Carbon\Carbon::today())
    ->count();
}

});
