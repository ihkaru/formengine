<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
Route::post('/login', [LoginController::class, 'login']);
