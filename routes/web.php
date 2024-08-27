<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\RespondentSurvey;
use App\Http\Controllers\ArtisanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function(){
    return redirect()->to('/admin/login');
})->name('login');
Route::get("/run",[ArtisanController::class,"run"]);

// routes/web.php


