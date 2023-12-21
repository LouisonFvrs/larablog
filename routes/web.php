<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/* Problème :
- Affichage multiselect
- layout inconnue
*/

Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('/register', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Gestion des articles
Route::get('/articles/create', [\App\Http\Controllers\UserController::class, 'create'])->middleware(['auth', 'verified'])->name('articles.create');
Route::post('/articles/store', [\App\Http\Controllers\UserController::class, 'store'])->middleware(['auth', 'verified'])->name('articles.store');
Route::get('/articles/{article}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('articles.edit');
Route::post('/articles/{article}/update', [\App\Http\Controllers\UserController::class, 'update'])->middleware(['auth', 'verified'])->name('articles.update');
Route::get('/articles/{article}/delete', [\App\Http\Controllers\UserController::class, 'delete'])->middleware(['auth', 'verified'])->name('articles.delete');

//Gestion du like
Route::get('/{article}/like', [\App\Http\Controllers\ArticleController::class, 'like'])->middleware(['auth', 'verified'])->name('article.like');

// Gestion de la partie public
Route::get('/', [\App\Http\Controllers\PublicController::class, 'home'])->name('home');
Route::get('/{user}', [\App\Http\Controllers\PublicController::class, 'index'])->name('public.index');
Route::get('/{user}/{article}', [\App\Http\Controllers\PublicController::class, 'show'])->name('public.show');

// Gestion des commentaires
Route::post('/comments/{article}/store', [\App\Http\Controllers\CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comments.store');

require __DIR__.'/auth.php';
