<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware("auth:sanctum")->group(function () {
    Route::get("users", [UserController::class, "index"]);
    Route::get("kegiatans", [KegiatanController::class, "index"]);
    Route::get("kegiatans/{kegiatan}", [KegiatanController::class, "loadKegiatan"]);
});
