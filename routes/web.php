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
# The todo lists should be reversed for the individual lists
# Create an Edit form for the user to edit the todos
# The Delete action in the list should show the flash message as well
# On the main 'All Lists' page, all the todos are assigned to Groceries by default - maybe make this an inbox.
# For future - user should be able to reassign the todos to different lists

*/

//Overview of all lists and tasks
Route::get('/', 'TodoController@index');

//Shows only the tasks related to a TaskList in the list view
Route::get('/show-list/{id}', 'TaskListController@show');

//The following two route controllers are used to store tasks and lists
Route::resource('todos', 'TodoController');
Route::resource('taskList', 'TaskListController');

//For the todos per list
Route::resource('/show-list/{id}/todos-per-list', 'TodoController@todoPerList');


//Edit and Delete the todos
Route::resource('/todos/{id}/edit', 'TodoController');
//Value of hidden input needs to be DELETE
Route::resource('/todos/{id}/delete', 'TodoController@destroy');



//Authentication routes
Auth::routes();

Route::get('/home', 'HomeController@index');
