<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


use App\Models\Category;

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


Route::redirect('/home', '/')->middleware('auth');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/home');

    Route::get('/home', [BookController::class, 'dashboard'])->name('home');
    
    // my books
    Route::get('/mybooks', [BookController::class, 'mybooks'])->middleware('writer')->name('mybooks.index');
    
    Route::get('/mybooks/create', [BookController::class, 'mybooksCreate'])->middleware('writer')->name('mybooks.create');
    Route::post('/mybooks', [BookController::class, 'mybooksStore'])->middleware('writer')->name('mybooks.store');

    Route::get('/mybooks/{book}/edit', [BookController::class, 'mybooksEdit'])->middleware('can:update-book,book')->name('mybooks.edit');
    Route::patch('/mybooks/{book}', [BookController::class, 'mybooksUpdate'])->middleware('can:update-book,book')->name('mybooks.update');
    
    Route::delete('/mybooks/{book:slug}', [BookController::class, 'destroy'])->middleware('can:update-book,book')->name('mybooks.destroy');
    Route::get('/mybooks/{book:slug}', [BookController::class, 'mybooksShow'])->middleware('can:update-book,book')->name('mybooks.show');

    Route::post('/mybooks/export-excel', [BookController::class, 'exportExcel'])->middleware('writer')->name('mybooks.export-excel');

    // books
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    
    // sigle book
    Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('books.show');
    
    // categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    
    // authors
    Route::get('/authors', [UserController::class, 'index'])->name('authors.index');
    
    // publishers
    Route::get('/publishers', [PublisherController::class, 'index'])->name('publishers.index');

    // profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.index');

    Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [UserController::class, 'update'])->name('profile.update');

});
