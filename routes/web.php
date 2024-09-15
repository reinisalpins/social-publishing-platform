<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckCommentOwnership;
use App\Http\Middleware\CheckPostOwnership;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/posts');

    Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/category/{slug}', [PostController::class, 'category'])->name('category');
        Route::get('/search', [PostController::class, 'search'])->name('search');
        Route::get('/user/{user_id}', [PostController::class, 'userPosts'])->name('user');

        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('/manage', [PostController::class, 'manage'])->name('manage');

        Route::get('/{post_id}', [PostController::class, 'show'])->name('show');

        Route::middleware(CheckPostOwnership::class)->group(function () {
            Route::get('/{post_id}/edit', [PostController::class, 'edit'])->name('edit');
            Route::patch('/{post_id}', [PostController::class, 'update'])->name('update');
            Route::delete('/{post_id}', [PostController::class, 'destroy'])->name('destroy');
        });

        Route::post('/{post_id}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::middleware(CheckCommentOwnership::class)
            ->delete('/comments/{comment_id}', [CommentController::class, 'destroy'])
            ->name('comments.destroy');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::patch('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    });
});
