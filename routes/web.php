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
        'manga' => 'Dashboard\MangaController',
        'video' => 'Dashboard\Leader\VideoController',
        'logs' => 'Dashboard\ActivityController',
        'member' => 'Dashboard\Leader\MemberController',
    ], [
        'except' => ['show', 'destroy'],
    ]);

    Route::apiResource('task', 'Dashboard\TasksController')->except(['show', 'destroy']);

    Route::group(['prefix' => 'manga'], function () {
        Route::get('copyright', 'Dashboard\MangaController@copyrightIndex')->name('manga.copyright');

        Route::group(['prefix' => 'action'], function () {
            Route::get('create', 'Dashboard\MangaController@create')->name('manga.action.create');
            Route::get('trade_mark/create', 'Dashboard\MangaController@tradeMark')->name('manga.action.create.trade_mark');

            Route::get('/get/group', 'Dashboard\MangaController@loadGroup')->name('manga.loadGroup');
            Route::get('/get/manga', 'Dashboard\MangaController@loadManga')->name('manga.loadManga');

            Route::post('/trade_mark/add', 'Dashboard\MangaController@addTradeMark')->name('manga.add.trade_mark');
        });

    });

    Route::group(['prefix' => 'group'], function () {

        Route::group(['prefix' => 'action'], function () {
            Route::get('create', 'Dashboard\GroupController@create')->name('group.action.create');

            Route::get('leader', 'Dashboard\GroupController@leaderForm')->name('group.leader');

            Route::get('/get/group', 'Dashboard\GroupController@loadGroups')->name('group.loadGroups');
            Route::get('/get/leader', 'Dashboard\GroupController@loadLeaders')->name('group.loadLeaders');

            Route::post('/leader/update', 'Dashboard\GroupController@updateLeader')->name('updateLeader');

            Route::post('reset/{language}', 'Dashboard\GroupController@resetFollows')->name('follows.reset');
        });
    });

    // Route::get('group/leader', 'Dashboard\GroupController@leaderForm')->name('group.leader');
    // Route::resource('task', 'Dashboard\TasksController')->except(['create', 'show' ,'destroy']);

});

// Api Group
Route::group(['prefix' => 'api', 'middleware' => ['auth', 'dashboard']], function () {

    Route::group(['prefix' => 'permission'], function () {
        Route::get('/lists', 'Api\Permission@getLists')->name('api.permission.lists');
        Route::get('/lists/edit', 'Api\Permission@editData')->name('api.permission.lists.edit');

        Route::get('/lists/remove', 'Api\Permission@removeData')->name('api.permission.lists.remove');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('language/{language}', 'Api\UserApi@getUser')->name('api.user.table');
        
        Route::get('/lists/member', 'Api\MemberApi@getMember')->name('api.member.table');

        Route::get('unverified', 'Api\UserApi@getUnVerified')->name('api.user.not.verified');

        Route::get('/lists/remove', 'Api\UserApi@userRemove')->name('api.user.lists.remove');
    });

    Route::group(['prefix' => 'group'], function () {
        Route::group(['prefix' => 'table'], function () {
            Route::get('language/{language}', 'Api\GroupApi@getGroup')->name('api.group.table');

            Route::get('/lists/remove', 'Api\GroupApi@groupRemove')->name('api.group.table.lists.remove');
        });
    });

    Route::group(['prefix' => 'manga'], function () {
        Route::group(['prefix' => 'table'], function () {
            Route::get('language/{language}', 'Api\MangaApi@getMangaList')->name('api.manga.table');

            Route::get('/lists/remove', 'Api\MangaApi@removeManga')->name('api.manga.table.lists.remove');
        });
    });

    Route::group(['prefix' => 'copyright'], function () {
        Route::group(['prefix' => 'table'], function () {
            Route::get('language/{language}', 'Api\MangaApi@getTradeMarks')->name('api.copyright.table');

            Route::get('/lists/remove', 'Api\MangaApi@removeCopyright')->name('api.manga.copyright.remove');
        });
    });

    Route::group(['prefix' => 'task'], function () {
        Route::get('personal', 'Api\TasksApi@getPersonalTask')->name('api.task.personal');
    });

    Route::group(['prefix' => 'logs'], function () {
        Route::get('model/{type}/{modelName}', 'Api\LogApi@getLog')->name('api.log.model');
        
        Route::delete('model/{model}','Api\LogApi@deleteNullCauser')->name('api.log.user.delete');
    });
});

//  Error Handling Page
Route::get('page-not-found', ['as' => 'notfound', 'uses' => 'ErrorHandlingController@notfound']);

// Testing route
// Route::get('test/user/api', 'Api\UserApi@getVietnameseUser')->name('api.test.user');

/**
 *
 */
