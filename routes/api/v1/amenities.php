<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmenityController;

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
  Route::apiResource('amenities', AmenityController::class);
});

// Route::middleware('auth:sanctum')->group(function () {
//   Route::apiResource('properties', PropertyController::class);
// });
