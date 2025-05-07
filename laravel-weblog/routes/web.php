<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentsController;

Route::get('/', function () {
    return redirect('/articles');
});


Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::patch('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::post('articles/{article}/comments', [CommentsController::class, 'store'])->name('comments.store');

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('user/{user}/articles', [UserController::class, 'userArticles'])
    ->name('user.articles')
    ->middleware('auth');

Route::get('premium', [PremiumController::class, 'index'])->name('premium.index');
Route::post('/premium', [PremiumController::class, 'store'])
    ->middleware('auth')
    ->name('premium.store');

Route::get('register', [UserController::class, 'create'])->name('register.create');
Route::post('register', [UserController::class, 'store'])->name('register.store');

Route::get('login', [SessionController::class, 'index'])->name('login.index');
Route::post('login', [SessionController::class, 'store'])->name('login.store');
Route::post('logout', [SessionController::class, 'destroy'])->name('logout.destroy');