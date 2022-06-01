<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('login.index');
Route::post('/', [AuthController::class, 'loginUser'])->name('login.store');
Route::get('/register', [AuthController::class, 'register'])->name('register.index');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');
// Demo
Route::post('/', [AuthController::class, 'demoLogin'])->name('guest:login');


Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('members', [DashboardController::class, 'memberIndex'])->name('members:index');
    Route::post('members/create', [DashboardController::class, 'saveMember'])->name('members:store');
    Route::get('members/edit', [DashboardController::class, 'editMember'])->name('members:edit');
    Route::put('members/{member}/update', [DashboardController::class, 'updateMember'])->name('members:update');
    Route::delete('members/{member}/delete', [DashboardController::class, 'deleteMember'])->name('members:destroy');

    Route::get('testimonies', [DashboardController::class, 'testimonyIndex'])->name('testimony:index');
});


// If anything goes wrong
// Route::fallback(function () {
//     return view('errors.404');
// });
