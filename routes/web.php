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



// login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/home');

    Route::get('/home', function () {
        return view('dashboard.index', [
            'title' => 'Home',
            'active' => 'home'
        ]);
    });
    
    // books
    Route::get('/books', [BookController::class, 'index']);
    
    // sigle book
    Route::get('/books/{book:slug}', [BookController::class, 'show']);
    
    // categories
    Route::get('/categories', [CategoryController::class, 'index']);
    
    // authors
    Route::get('/authors', [UserController::class, 'index']);
    
    // publishers
    Route::get('/publishers', [PublisherController::class, 'index']);
});
