<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
  Route::apiResource('properties', PropertyController::class);
});

// Route::middleware('auth:sanctum')->group(function () {
//   Route::apiResource('properties', PropertyController::class);
// });
