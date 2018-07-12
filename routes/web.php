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

Route::post('/locale', 'LanguageController@lang')->name('language');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([
    'middleware'=> ['auth'],
],function(){
    Route::get('tasks/showArchived', [
        'uses' => 'MyController@showArchived',
        'as' => 'tasks.showArchived'
    ]);
    Route::resource('tasks', 'MyController');

    Route::put('tasks/update/{task}', ['uses' => 'MyController@archive',
        'as'=> 'tasks.archive']);


});
