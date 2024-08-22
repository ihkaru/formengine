<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\RespondentSurvey;


Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

Route::get('/survey/{surveyId}', RespondentSurvey::class)->name('respondent.survey');
