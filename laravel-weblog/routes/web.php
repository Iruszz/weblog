<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [SessionController::class, 'index']);
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/articles/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::post('/login', [SessionController::class, 'store']);