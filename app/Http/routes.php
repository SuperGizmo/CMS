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

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');

    Route::get('/pages', 'Admin\PageController@index')->name('pages');
    
    Route::get('/addPages', 'Admin\PageController@create')->name('addPage');
    Route::put('/postPage', 'Admin\PageController@store')->name('postPage');

    Route::get('/editPage/{id}', 'Admin\PageController@edit')->name('editPage');
    Route::put('/editPage/{id}', 'Admin\PageController@update')->name('postEditPage');

    Route::get('/deletePage/{id}', 'Admin\PageController@destroy')->name('deletePage');
});
