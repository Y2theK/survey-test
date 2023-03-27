<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class,'logout']);
    Route::apiResource('surveys', SurveyController::class)->except('update');
});
Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found.'], 404);
});
