<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminActorController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminLanguageController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    /*ALL BASIC ROUTES IN ONE FUNCTION*/
    //VARIANT 1
    // Route::resource('movies', AdminMovieController::class);
    // Route::resource('actors', AdminActorController::class);
    // Route::resource('languages', AdminLanguageController::class);
    // Route::resource('countries', AdminCountryController::class);

    /*CAN CHOOSE WHICH ROUTES TO CREATE  */
    // Route::resource('admin/movies', AdminMovieController::class)->only('index','create');
    // Route::resource('admin/movies', AdminMovieController::class)->except('update','store');

     /*ALL BASIC ROUTES IN ONE FUNCTION*/
    //VARIANT 2
    Route::resources([
        'movies' => AdminMovieController::class,
        'actors' => AdminActorController::class,
        'languages' => AdminLanguageController::class,
        'countries' => AdminCountryController::class,
        'genres' => AdminGenreController::class,
    ]);
});

// TO INDEX
// Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('admin.movies');
// //TO CREATE
// Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('admin.movies.create');
// //TO SHOW + PARAMETER ROUTE MODEL BINDING
// Route::get('/admin/movies/{movie}', [AdminMovieController::class, 'show'])->name('admin.movies.show');
// //TO UPDATE + PARAMETER ROUTE MODEL BINDING
// Route::put('/admin/movies/{movie}', [AdminMovieController::class, 'update'])->name('admin.movies.update');
// //TO STORE 
// Route::post('/admin/movies', [AdminMovieController::class, 'store'])->name('admin.movies.store');
// //TO DELETE
// Route::delete('/admin/movies/{movie}', [AdminMovieController::class, 'destroy'])->name('admin.movies.destroy');
// //TO EDIT
// Route::get('/admin/movies/{movie}/edit', [AdminMovieController::class, 'edit'])->name('admin.movies.edit');

