<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

// Resource Route untuk fungsionalitas penuh CRUD Books
Route::resource('books', BookController::class);