<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;

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
    return view('home');
})->name('home');

// Category routes
Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function (){

        Route::get('/list','show')->name('list');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::delete('/delete/{category}','delete')->name('delete');
});

//Todos routes
Route::prefix('todos')->name('todos.')->controller(TodoController::class)->group(function (){

});
