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

Route::get('/', 'TasksController@index');

Route::resource('tasks', 'TasksController');
/*
// CRUD
Route::post('tasks', 'tasksController@store')->name('tasks.store');
Route::put('tasks/{id}', 'tasksController@update')->name('tasks.update');
Route::delete('tasks/{id}', 'tasksController@destroy')->name('tasks.destroy');

// index: showの補助ページ
Route::get('tasks', 'tasksController@index')->name('tasks.index');

// create: 新規作成用のフォームページ
Route::get('tasks/create', 'tasksController@create')->name('tasks.create');

// show: 個別のメッセージ詳細ページ
Route::get('tasks/{id}', 'tasksController@show')->name('tasks.show');

// edit: 更新用のフォームページ
Route::get('tasks/{id}/edit', 'tasksController@edit')->name('tasks.edit');
*/

