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

        Route::get('list','show')->name('list');
        Route::get('showTodos/{category}','showTodos')->name('showTodos');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::delete('delete/{category}','delete')->name('delete');
        Route::get('edit/{category}','edit')->name('edit');
        Route::put('update/{category}','update')->name('update');

});

//Todos routes
Route::prefix('todos')->name('todos.')->controller(TodoController::class)->group(function (){
        Route::get('list','show')->name('list');
        Route::get('detail/{todo}','detail')->name('detail');
        Route::get('check/{todo}','check')->name('check');
        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');
        Route::delete('delete/{todo}','delete')->name('delete');
        Route::get('edit/{todo}','edit')->name('edit');
        Route::put('update/{todo}','update')->name('update');
});
