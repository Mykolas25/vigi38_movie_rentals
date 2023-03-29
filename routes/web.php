<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Admin\AdminActorController;
use App\Http\Controllers\Admin\AdminGenreController;
use App\Http\Controllers\Admin\AdminMovieController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Front\FrontMovieController;
use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\Auth\RegistrationController;

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

//Public routes, accesible to anyone
Route::name('front.')->group(function () {
    Route::get('/', [FrontHomeController::class, 'index'])->name('home');
    Route::resource('movies', FrontMovieController::class)->only(['index', 'show']);
});

//Routes grouped under admin prefix - admin panel and admin auth routes
Route::prefix('admin')->name('admin.')->group(function () {

    //Routes protected by auth middleware, accass to routes only for authenticated users
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('home');
        Route::resources([
            'movies' => AdminMovieController::class,
            'actors' => AdminActorController::class,
            'languages' => AdminLanguageController::class,
            'countries' => AdminCountryController::class,
            'genres' => AdminGenreController::class,
        ]);
        //Logout route accassible when authenticated
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });

    //Routes protected by guest middleware, accass to routes only for guest - not authenticated users
    //If user authenticated, redirects to admin.home
    Route::middleware('guest')->name('auth.')->group(function () {
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
        Route::get('/registration', [RegistrationController::class, 'registration'])->name('registration');
        Route::post('/register', [RegistrationController::class, 'register'])->name('register');
    });
});
