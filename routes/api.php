<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Api\FeedController;
use App\Http\Controllers\Api\FeedController as ApiFeedController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api ');


// Route::get('/feed', [FeedController::class, 'index']);


Route::get('/feed', [FeedController::class, 'index']);







// Route::post('/projects', [:y:class, 'store']);
// Route::get('/projects/{id}', [:v:class, 'show']);
// Route::put('/projects/{id}', [:f:class, 'update']);
// Route::delete('/projects/{id}', [:e:class, 'destroy']);


?>



