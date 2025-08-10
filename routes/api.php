<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BrandController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public test endpoint
Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API is working!',
        'version' => 'v1'
    ]);
});

// Authentication endpoint
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'success' => true,
        'data' => $request->user()
    ]);
});

// API Version 1 Routes
Route::prefix('v1')->group(function () {
    // Brand Resource Routes
    Route::apiResource('brands', BrandController::class)->only([
        'index', 'show'
    ]);

    // Additional brand endpoints
    Route::prefix('brands')->group(function () {
        // Filter by minimum rating
        Route::get('filter/{rating}', [BrandController::class, 'filterByRating']);

        // Get brands by country
        Route::get('country/{countryCode}', [BrandController::class, 'getByCountry']);
    });

    // Protected routes (require authentication)
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('brands', BrandController::class)->except([
            'index', 'show'
        ]);
    });
});
