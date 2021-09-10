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

Route::get('/', 'TareaController@index');


Route::get('/tareas', 'TareaController@index')->name('tareas.index');
Route::get('/tareas/create', 'TareaController@create')->name('tareas.create');
Route::post('/tareas', 'TareaController@store')->name('tareas.store');
Route::get('/tareas/{tarea}', 'TareaController@show')->name('tareas.show');
Route::get('/tareas/{tarea}/edit', 'TareaController@edit')->name('tareas.edit');
Route::put('/tareas/{tarea}', 'TareaController@update')->name('tareas.update');
Route::delete('/tareas/{tarea}', 'TareaController@destroy')->name('tareas.destroy');




Auth::routes();


