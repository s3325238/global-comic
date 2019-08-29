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

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::group(['prefix' => '/'], function () {
    Route::get('/','IndexController@index')->name('home');

    Route::group(['prefix' => '/manga'], function() {
        Route::get('/','MangaController@index')->name('manga');
        Route::get('/single', 'MangaController@show')->name('single');
        Route::get('/single/chapter','MangaController@specific')->name('chapter');
    });
    // Route::get('/manga-list','MangaController@index')->name('manga');
    // Route::get('/manga-list/single', 'MangaController@show')->name('single');
    // Route::get('/manga-list/single/chapter','MangaController@specific')->name('chapter');

    Route::get('/translate-group','TranslateGroupController@index')->name('group');
    Route::get('/translate-group/single','TranslateGroupController@show')->name('singleGroup');
});


Route::get('test-login','IndexController@testLogin')->name('testLogin');