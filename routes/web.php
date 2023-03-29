<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontMovieController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');
    Route::resources([
        'movies' => AdminMovieController::class,
        'actors' => AdminActorController::class,
        'languages' => AdminLanguageController::class,
        'countries' => AdminCountryController::class,
        'genres' => AdminGenreController::class,
    ]);
});

Route::name('front.')->group(function () {
    Route::get('/', [FrontHomeController::class, 'index'])->name('home');
    Route::resource('movies', FrontMovieController::class)->only(['index', 'show']);
});
