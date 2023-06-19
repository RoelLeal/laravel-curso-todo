<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tareas', 
    [TodoController::class, 'index'])->name('tareas');

Route::post('/tareas', 
    [TodoController::class, 'storeTodo'])->name('tareas');

Route::get('/tareas/{id}', 
    [TodoController::class, 'show'])->name('todo-edit');
Route::patch('/tareas/{id}', 
    [TodoController::class, 'update'])->name('todo-update');
Route::delete('/tareas/{id}', 
    [TodoController::class, 'destroy'])->name('todo-destroy');

Route::resource('categories', CategoriesController::class);