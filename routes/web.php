<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Produtos\EanController;

Route::get('/', function () {
    return redirect()->route('page.index');
});

Route::resource('listing', ListingController::class);

Route::get('login', [AuthController::class, 'create'])
    ->name('login');
Route::post('login', [AuthController::class, 'store'])
    ->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])
    ->name('logout');

Route::get('page/index', [IndexController::class, 'index'])
    ->name('page.index');
Route::get('hello', [IndexController::class, 'show'])
    ->name('page.hello');



Route::get('cean', [EanController::class, 'show'])
    ->name('cean.show');

Route::get('welcome', function () {
    return 'welcome';
})->name('page.home');

Route::get('page/admin', function () {
    return 'admin';
})->name('page.admin');
Route::get('page/erp', function () {
    return 'erp';
})->name('page.erp');

Route::get('teste', function () {
    return redirect()->route('listing.index')
        ->with('success', 'teste redir - ' . date('his'));
});
