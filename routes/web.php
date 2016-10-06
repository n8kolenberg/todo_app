<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    $todos = App\Todo::All();
    return view('welcome', ['todos' => $todos]);
});

Route::resource('todos', 'TodoController');


Auth::routes();

Route::get('/home', 'HomeController@index');
