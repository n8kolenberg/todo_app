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

//Overview of all lists and tasks
Route::get('/', 'TodoController@index');

//Shows only the tasks related to a TaskList
Route::get('/show-list/{id}', 'TaskListController@show');

//The following two are used to store tasks and lists
Route::resource('todos', 'TodoController');
Route::resource('taskList', 'TaskListController');

//For the todos per list
Route::resource('/show-list/{id}/todos-per-list', 'TodoController@todoPerList');


//Edit and Delete
Route::resource('/todo-edit/{id}', 'TodoController@update');
Route::resource('/todo-delete/{id}', 'TodoController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index');
