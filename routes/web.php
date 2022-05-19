<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('{all}', [Controller::class, 'dashboard'])->where('all', '^((?!api).)*')->name('dasboard');
Route::view('/', 'dashboard');

// Route::get('/', [AuthController::class, 'login'])->name('login');
// Route::post('/', [AuthController::class, 'loginUser'])->name('login.store');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerUser'])->name('register.store');
Route::get('logout', [AuthController::class, 'logoutUser'])->name('logout');
// Demo
Route::post('/', [AuthController::class, 'demoLogin'])->name('guest:login');


// Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function () {

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('members', [DashboardController::class, 'memberIndex'])->name('members:index');
Route::post('members/create', [DashboardController::class, 'saveMember'])->name('members:store');
Route::get('members/edit', [DashboardController::class, 'editMember'])->name('members:edit');
Route::put('members/{member}/update', [DashboardController::class, 'updateMember'])->name('members:update');
Route::delete('members/{member}/delete', [DashboardController::class, 'deleteMember'])->name('members:destroy');

Route::get('testimonies', [DashboardController::class, 'testimonyIndex'])->name('testimony:index');
// });


// If anything goes wrong
// Route::fallback(function () {
//     return view('errors.404');
// });
