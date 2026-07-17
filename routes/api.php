<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobOfferController;
use App\Http\Controllers\Api\ApplicationController;

Route::apiResource('jobs', JobOfferController::class);

Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])
    ->name('jobs.apply');

Route::get('/jobs/{job}/applications', [ApplicationController::class, 'index'])
    ->name('jobs.applications');
