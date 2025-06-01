<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahKerjaController;
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
    Route::get("wilayah-kerja/{kegiatan}", [WilayahKerjaController::class, "wilayahKerja"]);
    Route::get("assignments/jumlah", [AssignmentController::class, "jumlah"]);
    Route::get("assignments", [AssignmentController::class, "index"]);
    Route::get("assignments/{assignment}", [AssignmentController::class, "show"]);
    Route::post('assignments/{assignment}/sync', [AssignmentController::class, 'sync']);
});
