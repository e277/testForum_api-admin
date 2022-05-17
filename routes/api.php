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
Route::post('register', [ApiAuthController::class, 'register'])->name('registerApi');
Route::post('login', [ApiAuthController::class, 'login'])->name('loginApi');

Route::middleware(['auth:sanctum'])->group(function () {

    // Auth routes
    Route::post('logout', [ApiAuthController::class, 'logout'])->name('logoutApi');

    // Members routes
    Route::get('/members', [MemberController::class, 'index'])->name('memberApi.index');

    // Testimony routes
    Route::get('/testimonies', [TestimonyController::class, 'index'])->name('testimonyApi.index');
    Route::post('/testimonies', [TestimonyController::class, 'store'])->name('testimonyApi.store');
});
