<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DeliveryController;

Route::apiResource('workspaces', WorkspaceController::class);
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('workspaces/{workspace}/invite', [WorkspaceController::class, 'invite']);

Route::apiResource('tasks', TaskController::class);

Route::apiResource('deliveries', DeliveryController::class);
