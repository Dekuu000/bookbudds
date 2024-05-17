<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RequestedBookController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('user-profiles', UserProfileController::class);
Route::resource('authors', AuthorController::class);
Route::resource('genres', GenreController::class);
Route::resource('books', BookController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('requested-books', RequestedBookController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
