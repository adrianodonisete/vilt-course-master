<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

Route::get('/', function () {
  return redirect()->route('listing.index');
});

Route::resource('listing', ListingController::class);


Route::get('/welcome', function () {
  return view('welcome');
});

Route::get('/page/index', [IndexController::class, 'index'])
  ->name('page.index');
Route::get('/hello', [IndexController::class, 'show'])
  ->name('page.hello');

Route::get('/teste', function () {
  return redirect()->route('listing.index')
    ->with('success', 'teste redir - ' . date('his'));
});
