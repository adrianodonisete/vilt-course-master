<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GLPI\ControleTiController;

Route::prefix('controle-ti')->group(function () {
    Route::get('/', [ControleTiController::class, 'index'])
        ->name('controle-ti.index');
    Route::get('/create', [ControleTiController::class, 'create'])
        ->name('controle-ti.create');
    Route::post('/', [ControleTiController::class, 'store'])
        ->name('controle-ti.store');
    Route::get('/{id}', [ControleTiController::class, 'show'])
        ->name('controle-ti.show');
    Route::get('/{id}/edit', [ControleTiController::class, 'edit'])
        ->name('controle-ti.edit');
    Route::put('/{id}', [ControleTiController::class, 'update'])
        ->name('controle-ti.update');
    Route::delete('/{id}', [ControleTiController::class, 'destroy'])
        ->name('controle-ti.destroy');
});
