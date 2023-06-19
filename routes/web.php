<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('dashboard.index', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

// books
Route::get('/books', [BookController::class, 'index']);

// sigle book
Route::get('/books/{book:slug}', [BookController::class, 'show']);