<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MealHistoryController;
use App\Http\Controllers\Api\BodyRecordController;
use App\Http\Controllers\Api\DiaryRecordController;
use App\Http\Controllers\Api\ExerciseRecordController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\MealTargetController;
use App\Http\Controllers\Api\RecommendationCategoryController;
use App\Http\Controllers\Api\RecommendationController;
use App\Http\Controllers\Api\TagController;

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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::apiResource('/recommendation-categories', RecommendationCategoryController::class)->only(['index', 'show']);
Route::apiResource('/recommendations', RecommendationController::class)->only(['index', 'show']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/me', [AuthController::class, 'me']);

    // meals
    Route::apiResource('/meals', MealController::class);

    // meal target
    Route::apiResource('/meal-targets', MealTargetController::class);

    // meal history
    Route::apiResource('/meal-history', MealHistoryController::class);

    // body record
    Route::apiResource('/body-record', BodyRecordController::class);

    // exercise record
    Route::apiResource('/exercise-record', ExerciseRecordController::class);

    // diary record
    Route::apiResource('/diary-record', DiaryRecordController::class);

    // recommendation categories
    Route::apiResource('/admin-recommendation-categories', RecommendationCategoryController::class);

    // admin recommendations (just logged in)
    Route::apiResource('/admin-recommendations', RecommendationController::class);

     // tags
     Route::apiResource('/tags', TagController::class);


});
