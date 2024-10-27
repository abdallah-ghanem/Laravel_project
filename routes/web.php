<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Add this method to your AuthController
Route::get('/verify', [AuthController::class, 'showVerifyCodeForm'])->name('verify'); // Add this method to your AuthController
Route::get('/users', [AuthController::class, 'showUsers'])->name('users'); // Add this line
/* Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
 */
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/verifyCode', [AuthController::class, 'verifyCode']);
