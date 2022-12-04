<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BusController;
use App\Http\Controllers\Api\PointController;
use App\Http\Controllers\Api\SuggestionController;
use App\Http\Controllers\Api\TimeController;
use App\Http\Controllers\Api\WayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::group(['middleware' => ['auth:sanctum']], static function () {
    Route::get('/points', [PointController::class, 'index']);
    Route::post('/points', [PointController::class, 'store']);
    Route::get('/points/{point}', [PointController::class, 'show']);
    Route::delete('/points/{point}', [PointController::class, 'destroy']);
    Route::get('/points/{way}/way', [PointController::class, 'getWayPoints']);
    Route::post('/way', [WayController::class, 'store']);
    Route::get('/way', [WayController::class, 'index']);
    Route::get('/way/{way}', [WayController::class, 'show']);
    Route::delete('/way/{way}', [WayController::class, 'destroy']);
    Route::get('/way/bus/{bus}', [WayController::class, 'getBusWays']);
    Route::post('/times', [TimeController::class, 'store']);
    Route::delete('/times/{time}', [TimeController::class, 'destroy']);
    Route::get('/times/{way}/way', [TimeController::class, 'getWayTimes']);
    Route::get('/times/{way}/way/working-days', [TimeController::class, 'getWayTimesInWorkingDays']);
    Route::get('/times/{way}/way/saturday', [TimeController::class, 'getWayTimesInSaturday']);
    Route::get('/times/{way}/way/sunday', [TimeController::class, 'getWayTimesInSunday']);
    Route::post('/buses', [BusController::class, 'store']);
    Route::get('/buses', [BusController::class, 'index']);
    Route::get('/buses/{bus}', [BusController::class, 'show']);
    Route::delete('/buses/{bus}', [BusController::class, 'delete']);
    Route::post('/suggestions', [SuggestionController::class, 'store']);
    Route::post('/suggestions/{suggestion}/vote-up', [SuggestionController::class, 'voteUp']);
    Route::post('/suggestions/{suggestion}/vote-down', [SuggestionController::class, 'voteDown']);
});
