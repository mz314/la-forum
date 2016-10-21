<?php
Route::get('/', [
    'uses' => 'HomeController@index'
]);

Route::group(['prefix' => '/forum'], function() {

    Route::get('/boards', [
        'uses' => 'BoardController@listing'
    ])->name('board_list');

    Route::get('/boards/{id}', [
        'uses' => 'BoardController@board'
    ])->name('board');

    Route::post('/boards/post', [
        'uses' => 'TopicController@create'
    ]);

    Route::get('/topic/{id}', [
        'uses' => 'TopicController@topic'
    ])->name('topic');

    Route::delete('/topic/{topic}/delete', [
        'uses' => 'TopicController@deleteTopic',
    ]);

    Route::delete('/topic/post/{post}/delete', [
        'uses' => 'TopicController@deletePost',
    ]);


    Route::post('/topic/reply', [
        'uses' => 'TopicController@reply'
    ]);

    Route::group(['prefix' => '/search'], function () {

        Route::get('', [
            'uses' => 'SearchController@index'
        ]);
        
         Route::post('search', [
            'uses' => 'SearchController@search'
        ]);
    });
});

Route::group(['prefix' => '/profile'], function() {
    Route::get('', [
        'uses' => 'ProfileController@index'
    ])->middleware('auth');


    Route::post('store', [
        'uses' => 'ProfileController@store'
    ])->middleware('auth')->name('store_profile');

    Route::get('/{name}', [
        'uses' => 'ProfileController@index'
    ]);
});

Auth::routes();
Route::get('logout', '\LaForum\Http\Controllers\Auth\LoginController@logout')->name('logout');

/*
 * Admin
 */

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/', [
        'uses' => 'Admin\DashboardController@index'
    ]);

    Route::resource('boards', 'Admin\BoardController');
    Route::resource('users', 'Admin\UserController');
});
