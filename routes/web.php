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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('tasks', ['uses' =>'MyController@index',
    'as'=> 'tasks.index']);
Route::get('tasks/create', ['uses'=> 'MyController@create',
    'as'=>'tasks.create']);
Route::post('tasks/store', ['uses'=> 'MyController@store',
    'as'=> 'tasks.store']);

