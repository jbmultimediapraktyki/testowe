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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tasks', 'MyController', ['only' => ['index', 'create', 'store','show', 'edit', 'update'], 'middleware' => ['auth']]);

Route::group([
    'middleware'=> ['auth'],
],function(){

    Route::put('tasks/update/{task}', ['uses' => 'MyController@archive',
        'as'=> 'tasks.archive']);
    Route::get('tasks/showArchived', ['uses' => 'MyController@showArchived',
        'as' => 'tasks.showArchived']);

});
