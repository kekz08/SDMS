<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipApplicationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('/admins/{admin}', [AdminController::class, 'update']);
Route::post('/admins', [AdminController::class, 'store']);
Route::delete('/admins/{id}', [AdminController::class, 'destroy']);

Route::post('/scholarships', [ScholarshipController::class, 'store']);
Route::put('/scholarships/{id}', [ScholarshipController::class, 'update']);
Route::delete('/scholarships/{id}', [ScholarshipController::class, 'destroy']);

