<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FeedController;
use App\Http\Controllers\Api\PortfolioProjectController;


Route::get('/test', [FeedController::class, 'index']);


// Route::middleware('auth:sanctum')
// ->post('/projects',[PortfolioProjectController::class, 'store']);


Route::middleware('auth:sanctum')->post(
    '/projects',
    [PortfolioProjectController::class, 'store']
);
