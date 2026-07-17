<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\TaskController;

Route::apiResource('workspaces', WorkspaceController::class);

Route::post('workspaces/{workspace}/invite', [WorkspaceController::class, 'invite']);
Route::apiResource('tasks',TaskController::class);