<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLogin']);

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('/articles/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::post('/articles', function() {
    return view('articles.index');
});