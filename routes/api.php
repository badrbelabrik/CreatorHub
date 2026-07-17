<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkspaceController;

Route::apiResource('workspaces', WorkspaceController::class);

Route::post('workspaces/{workspace}/invite', [WorkspaceController::class, 'invite']);