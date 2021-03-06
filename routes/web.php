<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/users/{user}/todolists', 'TodoListController@index')->name('todolist.index');
Route::get('/users/{user}/todolists/create', 'TodoListController@create')->name('todolist.create');
Route::post('/users/{user}/todolists/store', 'TodoListController@store')->name('todolist.store');
Route::delete('/users/{user}/todolists/{todoList}/delete', 'TodoListController@destroy')->name('todolist.destroy');

Route::get('/users/{user}/todolists/{todoList}/todos', 'TodoController@index')->name('todo.index');
Route::get('/users/{user}/todolists/{todoList}/todos/create', 'TodoController@create')->name('todo.create');
Route::post('/users/{user}/todolists/{todoList}/todos/store', 'TodoController@store')->name('todo.store');
Route::get('/users/{user}/todolists/{todoList}/todos/{todo}/edit', 'TodoController@edit')->name('todo.edit');
Route::put('/users/{user}/todolists/{todoList}/todos/{todo}/update', 'TodoController@update')->name('todo.update');
Route::delete('/users/{user}/todolists/{todoList}/todos/{todo}/delete', 'TodoController@destroy')->name('todo.destroy');

Route::get('/users/{user}/todolists/{todoList}/todos/export', 'ExportTodoListController');
