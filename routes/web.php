<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\RespondentSurvey;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CantikController;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/desacantik/kelurahanpulaupedalaman', [CantikController::class, "kelPulauPedalaman"])->name("cantik.pedalaman");


Route::get('/login', function () {
    auth()->logout();
    return redirect()->to('/admin/login');
})->name('login');
Route::get("/run", [ArtisanController::class, "run"]);

// routes/web.php
