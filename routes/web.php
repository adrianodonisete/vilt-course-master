<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class)
    ->only(['index', 'show', 'create', 'store']);

// Route::get('/', function () {
//     return inertia('Index/Index');
// });
