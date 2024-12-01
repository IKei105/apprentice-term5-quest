<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('/home', [ArticleController::class, 'index'])->name('home');

Route::get('/home/{id}', [ArticleController::class, 'indexPage'])->name('home.pageIndex');

//create
Route::get('/create', [ArticleController::class, 'create'])->name('create');

Route::post('/create', [ArticleController::class, 'register'])->name('register');

//edit
Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('edit');

//update
Route::post('/edit/{id}', [ArticleController::class, 'update'])->name('update');

//article
Route::get('/article', function () {
    return view('article');
});

//article
Route::get('/article/{id}', [ArticleController::class, 'article'])->name('article');

//delete
Route::get('/delete/{id}', [ArticleController::class, 'delete'])->name('delete');

//singinここね
Route::get('/signin', [UserController::class, 'getSignIn'])->name('signin.page');

//singinここね
Route::post('/signin', [UserController::class, 'signIn'])->name('signin');

//signup
Route::get('/signup', [UserController::class, 'getSignUp'])->name('signup.page');

Route::post('/signup', [UserController::class, 'signup'])->name('signup');

Route::get('/reset', [UserController::class, 'reset'])->name('reset');