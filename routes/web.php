<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\RespondentSurvey;
use App\Http\Controllers\ArtisanController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/run",[ArtisanController::class,"run"]);

// routes/web.php


