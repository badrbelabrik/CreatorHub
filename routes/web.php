<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkspaceController;

Route::get('/', function () {
    return view('welcome');
});

// Workspace Routes
Route::get('/workspaces', [WorkspaceController::class, 'index'])
    ->name('workspaces.index');

Route::get('/workspaces/create', [WorkspaceController::class, 'create'])
    ->name('workspaces.create');

Route::post('/workspaces', [WorkspaceController::class, 'store'])
    ->name('workspaces.store');
Route::get('/workspaces/{workspace}', [WorkspaceController::class, 'show'])
    ->name('workspaces.show');