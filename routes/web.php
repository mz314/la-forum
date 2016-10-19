<?php

Route::get('/', [
    'uses' => 'HomeController@index'
]);

Route::get('/boards', [
    'uses' => 'BoardController@listing'
])->name('board_list');

Route::get('/boards/{id}', [
    'uses' => 'BoardController@board'
])->name('board');

Route::post('/boards/post', [
    'uses' => 'BoardController@store'
]);

Route::get('/topic/{id}', [
    'uses'=>'TopicController@topic'
])->name('topic');


Route::post('/topic/reply', [
    'uses'=>'TopicController@reply'
]);


Route::get('/profile', [
    'uses'=>'ProfileController@index'
])->middleware('auth');;

Route::get('/profile/{name}', [
    'uses'=>'ProfileController@index'
]);


Auth::routes();


Route::get('logout', '\LaForum\Http\Controllers\Auth\LoginController@logout')->name('logout');