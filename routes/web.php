<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\CantikController;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/uploads/{path}', function ($path) {
    $file = storage_path('app/public/' . $path);

    if (!file_exists($file)) {
        abort(404);
    }

    $mime = mime_content_type($file);
    return response()->file($file, [
        'Content-Type' => $mime,
        'Access-Control-Allow-Origin' => '*',
    ]);
})->where('path', '.*');

Route::get('/desacantik', [CantikController::class, "index"])->name("cantik.index");
Route::get('/desa-cantik/kelurahanpulaupedalaman', [CantikController::class, "kelPulauPedalaman"])->name("cantik.pedalaman");
Route::get('/desa-cantik/desawajokhilir', [CantikController::class, "desWajokHilir"])->name("cantik.wajokhilir");
Route::get('/desa-cantik/desasejegi', [CantikController::class, "desSejegi"])->name("cantik.sejegi");

// Desa Binaan 2026 Routes (AppSheet)
Route::get('/desa-cantik/kelurahanpasirwansalim', [CantikController::class, "pasirWanSalim"])->name("cantik.pasirwansalim");
Route::get('/desa-cantik/desapasirpalembang', [CantikController::class, "pasirPalembang"])->name("cantik.pasirpalembang");
Route::get('/desa-cantik/desasungaibakaukecil', [CantikController::class, "sungaiBakauKecil"])->name("cantik.sungaibakaukecil");

// Pra Desa Cantik 2026 Route (Uji Lapangan CERDAS Survey Engine)
Route::get('/pra-desa-cantik/desasambora', [CantikController::class, "desaSambora"])->name("cantik.sambora");

Route::get("/run", [ArtisanController::class, "run"]);

// Cached API Endpoint for Desa Cantik Sheets Data (Shared Hosting / No-Docker compliant)
Route::get('/desa-cantik/api/{slug}/{sheet}', [CantikController::class, "getApiData"])->name("cantik.api");


