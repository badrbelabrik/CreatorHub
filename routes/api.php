<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FeedController;

Route::get('/feed', [FeedController::class, 'index']);
