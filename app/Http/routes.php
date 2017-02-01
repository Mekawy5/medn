<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('/article/{title_slug}', 'HomeController@show');
Route::get('/search', ['as' => 'search', 'uses' => 'HomeController@search']);
Route::get('/category/{key}', 'HomeController@category');
Route::get('/auth/facebook','Auth\AuthController@redirectToProvider');
Route::get('/auth/facebook/callback','Auth\AuthController@handleProviderCallback');


Route::auth();

//================== ADMIN PAGE ===================


Route::get('/admin', 'AdminLoginController@index');



//================= ADMIN GROUP ====================

Route::group(['middleware'=>'admin'],function(){



    //============== Users PAGE ===============
    Route::resource('/admin/users','AdminUsersController');
    //============== Posts PAGE ===============
    Route::resource('/admin/posts','AdminPostsController');
    //============== Category PAGE ===============
    Route::resource('/admin/categories','AdminCategoryController');
    //============== Media PAGE ===============
    Route::resource('/admin/media','AdminMediaController');



});



