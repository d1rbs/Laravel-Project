<?php

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

        /*view Auth*/
Auth::routes();

        /*view Admin*/
Route::get('/admin', function (){ return view('admin.dashboard');});

Route::group(['namespace'=>'Admin'], function(){
    /*Create articles*/
    Route::get('admin/article/create', 'ArticleController@create');
    Route::post('admin/article/create', 'ArticleController@create');
    /*Create chapter*/
    Route::get('admin/books/create', 'BooksController@create');
    Route::post('admin/books/create', 'BooksController@create');

    /*Create create*/
    Route::get('admin/role/create', 'RoleController@create');
    Route::post('admin/role/create', 'RoleController@create');

    /*Create category*/
    Route::get('admin/category/create', 'CategoryController@create');
    Route::post('admin/category/create', 'CategoryController@create');

    /* register*/
    Route::get('admin/users/register', 'RegisterController@create');
    Route::post('admin/users/register', 'RegisterController@create');

    Route::post('admin/article/delete/{id}', 'ArticleController@delete');

    Route::post('admin/article/destroy/{id}', 'ArticleController@destroy');

    Route::get('admin/article/update/{id}', 'ArticleController@update');
    Route::post('admin/article/update/{id}', 'ArticleController@update');

});

        /*view USERS*/
Route::get('/', function (){ return view('welcome');});

        /*view HOME*/
Route::get('/home', 'HomeController@index')->name('home');

        /*view Report*/
Route::get('/report', 'ReportController@index')->name('datesStore');

        /*view Profile*/
Route::get('profiles/index', 'ProfileController@index');

        /*view article*/
Route::get('article/{slug?}', 'ArticleController@index');




