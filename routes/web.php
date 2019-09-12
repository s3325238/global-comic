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

Auth::routes();

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'IndexController@index')->name('home');

    Route::group(['prefix' => '/manga'], function () {
        Route::get('/', 'MangaController@index')->name('manga');
        Route::get('/single', 'MangaController@show')->name('single');
        Route::get('/single/chapter', 'MangaController@specific')->name('chapter');
    });
    // Route::get('/manga-list','MangaController@index')->name('manga');
    // Route::get('/manga-list/single', 'MangaController@show')->name('single');
    // Route::get('/manga-list/single/chapter','MangaController@specific')->name('chapter');

    Route::get('/translate-group', 'TranslateGroupController@index')->name('group');
    Route::get('/translate-group/single', 'TranslateGroupController@show')->name('singleGroup');
});

Route::get('verify/{emai}/{verifyToken}', 'Auth\RegisterController@emailSent')->name('emailSent');

// Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'dashboard']], function () {

    Route::get('/', 'Dashboard\IndexController@index')->name('dashboard');

    Route::get('/inbox', 'Dashboard\IndexController@mail')->name('inbox');

    Route::post('/tasks', 'Dashboard\IndexController@add_task')->name('add.task');

    Route::get('/check_slug', 'Dashboard\IndexController@check_slug')->name('check_slug');

    // Testing route resource
    Route::resources([
        'permission' => 'Dashboard\RoleController',
        'user' => 'Dashboard\UserController',
        'group' => 'Dashboard\GroupController',
    ], [
        'except' => ['show', 'destroy'],
    ]);

    Route::apiResource('task', 'Dashboard\TasksController')->except(['show', 'destroy']);

    Route::group(['prefix' => 'group'], function () {

        Route::group(['prefix' => 'action'], function () {
            Route::get('create', 'Dashboard\GroupController@create')->name('group.action.create');

            Route::get('leader', 'Dashboard\GroupController@leaderForm')->name('group.leader');

            Route::get('/get/group', 'Dashboard\GroupController@loadGroups')->name('loadGroups');
            Route::get('/get/leader', 'Dashboard\GroupController@loadLeaders')->name('loadLeaders');

            Route::post('/leader/update', 'Dashboard\GroupController@updateLeader')->name('updateLeader');
        });
    });

    // Route::get('group/leader', 'Dashboard\GroupController@leaderForm')->name('group.leader');
    // Route::resource('task', 'Dashboard\TasksController')->except(['create', 'show' ,'destroy']);

});
// Api Group
Route::group(['prefix' => 'api', 'middleware' => ['auth', 'dashboard', 'admin']], function () {

    Route::group(['prefix' => 'permission'], function () {
        Route::get('/lists', 'Api\Permission@getLists')->name('api.permission.lists');
        Route::get('/lists/edit', 'Api\Permission@editData')->name('api.permission.lists.edit');
        Route::get('/lists/remove', 'Api\Permission@removeData')->name('api.permission.lists.remove');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('vietnamese', 'Api\UserApi@getVietnameseUser')->name('api.user.vietnamese');
        Route::get('english', 'Api\UserApi@getEnglishUser')->name('api.user.english');
        Route::get('japanese', 'Api\UserApi@getJapaneseUser')->name('api.user.japanese');
        Route::get('korean', 'Api\UserApi@getKoreanUser')->name('api.user.korean');
        Route::get('unverified', 'Api\UserApi@getUnVerified')->name('api.user.not.verified');
        Route::get('/lists/remove', 'Api\UserApi@userRemove')->name('api.user.lists.remove');
    });

    Route::group(['prefix' => 'group'], function () {
        Route::get('vietnamese', 'Api\GroupApi@getVietnameseGroup')->name('api.group.vietnamese');
    });

    Route::group(['prefix' => 'task'], function () {
        Route::get('personal', 'Api\TasksApi@getPersonalTask')->name('api.task.personal');
    });
});

//  Error Handling Page
Route::get('page-not-found', ['as' => 'notfound', 'uses' => 'ErrorHandlingController@notfound']);

// Testing route
// Route::get('test/user/api', 'Api\UserApi@getVietnameseUser')->name('api.test.user');

/**
 *
 */
