<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;



Route::get('/',[ BookController::class, 'index']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create', [BookController::class,'create' ])->name('create');
Route::post('/store', [BookController::class, 'store'])->name('store');
Route::get('/index',[ BookController::class, 'index'])->name('index');
Route::delete('/delete/{book}', [BookController::class, 'destroy']);    
Route::put('/books/{book}', [BookController::class, 'update'])->name('book.update');

Route::put('/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
// Route::put('/edit/{book}', [BookController::class, 'update'])->name('book.update');

// Route::post('/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
// Route::get('/edit', [BookController::class , 'edit']);






Route::get('/books/download/{id}', [BookController::class, 'download'])->name('books.download');
Route::get('/search', [BookController::class, 'search'])->name('book.search');
// Route::patch('');

// Route::resource('book', 'BookController');
