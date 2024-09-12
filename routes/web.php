<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/', [LoginController::class, 'attempt'])->name('login.attempt');
    });

    Route::prefix('register')->name('register.')->group(function () {
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('/', [RegisterController::class, 'attempt'])->name('attempt');
    });
});

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/feed');

    Route::prefix('feed')->name('feed.')->group(function () {
        Route::get('/', [FeedController::class, 'index'])->name('index');
        Route::get('/category/{slug}', [FeedController::class, 'category'])->name('category');
    });

//    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/manage', [PostController::class, 'manage'])->name('manage');
    });
});
