<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\RespondentSurvey;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CantikController;

Route::get('/', function () {
    return view('welcome');
})->name("home");
Route::get('/storage/kegiatan_uploads/{filename}', function ($filename) {
    $path = storage_path('app/public/kegiatan_uploads/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path, [
        'Content-Type' => 'image/webp',
        'Access-Control-Allow-Origin' => '*', // Or your domain
    ]);
});

Route::get('/desacantik/kelurahanpulaupedalaman', [CantikController::class, "kelPulauPedalaman"])->name("cantik.pedalaman");
Route::get('/login', function () {
    auth()->logout();
    return redirect()->to('/admin/login');
})->name('login');
Route::get("/run", [ArtisanController::class, "run"]);

// routes/web.php
