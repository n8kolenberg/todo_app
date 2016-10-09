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

/* TODO
# User comes to homepage and sees all tasks
# User clicks on List and sees tasks related to list
    # User is still able to click on any other list from this view and move on to it
    # User is able to click on all lists and return to main view
# User is able to add task within list which then gets linked to that list
    # $list->todos()->save($todo);

*/


Route::get('/', 'TodoController@index');
Route::get('/show-list/{id}', 'TaskListController@show');

Route::resource('todos', 'TodoController');
Route::resource('taskList', 'TaskListController');

Route::get('/list', 'TodoController@taskInList');

Auth::routes();

Route::get('/home', 'HomeController@index');
