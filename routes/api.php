<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\TestimonyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Auth Routes
Route::post('register', [ApiAuthController::class, 'register']);
Route::post('login', [ApiAuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {

    // require token to log out
    Route::post('logout', [ApiAuthController::class, 'logout']);
});


Route::get('/members', [MemberController::class, 'index']);


Route::get('/testimonies', [TestimonyController::class, 'index']);
Route::post('/testimonies', [TestimonyController::class, 'store']);
