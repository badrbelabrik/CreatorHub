<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkspaceController;

Route::get('/', function () {
    return view('welcome');
    Route::middleware('auth')->group(function () {

    Route::get('/workspaces', [WorkspaceController::class, 'index'])
        ->name('workspaces.index');

    Route::get('/workspaces/create', [WorkspaceController::class, 'create'])
        ->name('workspaces.create');

    Route::post('/workspaces', [WorkspaceController::class, 'store'])
        ->name('workspaces.store');

});
});
