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

    /* create */
    Route::get('admin/people/create','PeopleController@create');
    Route::post('admin/people/create','PeopleController@create');

    Route::get('admin/api/create','PeopleAPIController@create');

    Route::get('admin/planet/create','PlanetsController@create');

    Route::get('admin/films/create','FilmsController@create');

    Route::get('admin/gender/create','GenderController@create');
    Route::post('admin/gender/create','GenderController@create');

    Route::post('admin/people/delete/{id}','PeopleAPIController@delete');


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

Route::get('layouts/header_new', 'ProfileController@CreateToken');

/*people*/
Route::get('people/index', 'PeopleController@index');
Route::get('people/view/{id}', 'PeopleController@view');

Route::get('/reporting','ReportingController@index')->name('HomeStore');