<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfile;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('authors', AuthorController::class);

Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi.tampil');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::middleware('auth')->group(function (){

    Route::resource('userprofil', UserProfile::class);
    Route::get('/profile', [UserProfile::class, 'showProfile'])->name('profile');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{category}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});
