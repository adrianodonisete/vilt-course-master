<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

// Route::get('/', function () {
//     return inertia('Index/Index');
// });
