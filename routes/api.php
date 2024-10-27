<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// routes/api.php

use App\Http\Controllers\Api\UserController;

Route::post('/auth/register', [UserController::class, 'createUser']);
Route::post('/auth/login', [UserController::class, 'loginUser']);

