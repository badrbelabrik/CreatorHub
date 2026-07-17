<?php

use App\Http\Controllers\Api\FeedController;
use App\Http\Controllers\Api\PortfolioProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkspaceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobOfferController;
use App\Http\Controllers\Api\ApplicationController;

Route::apiResource('jobs', JobOfferController::class);

Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store']);

Route::get('/jobs/{job}/applications', [ApplicationController::class, 'index']);

Route::apiResource('workspaces', WorkspaceController::class);
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);
Route::post('workspaces/{workspace}/invite', [WorkspaceController::class, 'invite']);

Route::apiResource('tasks', TaskController::class);

Route::apiResource('deliveries', DeliveryController::class);

Route::get('/test', [FeedController::class, 'index']);


// Route::middleware('auth:sanctum')
// ->post('/projects',[PortfolioProjectController::class, 'store']);


Route::middleware('auth:sanctum')->post(
    '/projects',
    [PortfolioProjectController::class, 'store']
);
