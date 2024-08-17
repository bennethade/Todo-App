<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::prefix('todos')->as('todos.')->controller(TodoController::class)->group(function(){
//     Route::get('index','index')->name('index');
//     Route::get('create','create')->name('create');
//     Route::post('store','store')->name('store');
//     Route::get('view/{id}','view')->name('view');
//     Route::get('edit/{id}','edit')->name('edit');
//     Route::post('update','update')->name('update');
//     Route::delete('delete','delete')->name('delete');
// });

Route::get('/',[TodoController::class,'index'])->name('index');

Route::prefix('todos')->as('todos.')->group(function(){
    Route::get('index',[TodoController::class,'index'])->name('index');
    Route::get('create',[TodoController::class,'create'])->name('create');
    Route::post('store',[TodoController::class,'store'])->name('store');
    Route::get('view/{id}',[TodoController::class,'view'])->name('view');
    Route::get('edit/{id}',[TodoController::class,'edit'])->name('edit');
    Route::post('update',[TodoController::class,'update'])->name('update');
    Route::delete('delete',[TodoController::class,'delete'])->name('delete');
});



