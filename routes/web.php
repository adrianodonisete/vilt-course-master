<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Produtos\EanController;
use App\Http\Controllers\Users\UserAccountController;

Route::get('/', function () {
    return redirect()->route('page.index');
});

Route::resource('listing', ListingController::class)
    ->middleware('auth');

// Route::resource('listing', ListingController::class)
//     ->only(['create', 'store', 'edit', 'update', 'destroy'])
//     ->middleware('auth');
// Route::resource('listing', ListingController::class)
//     ->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::get('login', [AuthController::class, 'create'])
    ->name('login');
Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])
    ->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);


Route::get('page/index', [IndexController::class, 'index'])
    ->name('page.index')
    ->middleware('valid.option');
Route::get('hello', [IndexController::class, 'show'])
    ->name('page.hello')
    ->middleware('auth');



Route::get('routes', [IndexController::class, 'routes'])
    ->name('page.routes');

Route::get('welcome', function () {
    return 'welcome';
})->name('page.home');

Route::get('page/admin', function () {
    return 'admin';
})->name('page.admin');
Route::get('page/erp', function () {
    return 'erp';
})->name('page.erp');



// testes geral
Route::get('teste', function () {
    return redirect()->route('listing.index')
        ->with('success', 'teste redir - ' . date('his'));
});

// cean
Route::get('cean/create', [EanController::class, 'create'])
    ->name('cean.create');
Route::get('cean', [EanController::class, 'show'])
    ->name('cean.show');
Route::post('cean', [EanController::class, 'store'])
    ->name('cean.store');
