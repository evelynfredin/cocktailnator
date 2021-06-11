<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Data\CocktailController;
use App\Http\Controllers\Data\FavoriteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CocktailController::class, 'index'])->name('home');

// Move this to its rightful place after search fn is implemented
Route::get('search', function () {
    return view('pages.search');
})->name('search');

Route::middleware(['guest'])->group(function () {
    Route::get('signup', [RegisterController::class, 'index'])->name('signup');
    Route::post('signup', [RegisterController::class, 'store']);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
    Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
    Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', LogoutController::class);
    Route::post('addfavorite/{drink:id}', [FavoriteController::class, 'store'])->name('favorite');
});
