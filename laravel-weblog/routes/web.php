<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return redirect('/articles');
});


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/user/{user}/articles', [UserController::class, 'userArticles'])
    ->name('user.articles')
    ->middleware('auth');

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::post('articles/{id}/comments', [CommentController::class, 'store'])->name('comments.store');