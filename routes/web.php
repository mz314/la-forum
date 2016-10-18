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



Auth::routes();


Route::get('logout', '\LaForum\Http\Controllers\Auth\LoginController@logout')->name('logout');