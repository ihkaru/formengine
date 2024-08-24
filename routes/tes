<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use Illuminate\Support\Facades\Route;

Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
