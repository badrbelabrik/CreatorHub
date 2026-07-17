<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobOfferController;
use App\Http\Controllers\Api\ApplicationController;

Route::apiResource('jobs', JobOfferController::class);

Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store']);

Route::get('/jobs/{job}/applications', [ApplicationController::class, 'index']);
