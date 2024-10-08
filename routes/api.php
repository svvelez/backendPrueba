<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

 Route::apiResource("books",BooksController::class)->middleware('api');
 Route::get('get-books', [BooksController::class, 'index']);
 Route::post('create-book', [BooksController::class, 'createBook']);
 Route::delete('delete-book', [BooksController::class, 'deleteBook']);
 Route::post('get-book', [BooksController::class, 'getBook']);
 Route::post('edit-book', [BooksController::class, 'editBook']);