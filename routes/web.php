<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class);

Route::get('/teste', function () {
    return redirect()->route('listing.index')
        ->with('success', 'teste redir - ' . date('his'));
});

// Route::get('/', function () {
//     return inertia('Index/Index');
// });
