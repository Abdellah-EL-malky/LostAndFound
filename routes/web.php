<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', [Post::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Post::class, 'dashboard'])->name('dashboard');

    Route::resource('posts', Post::class);

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
