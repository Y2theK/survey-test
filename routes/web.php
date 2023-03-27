<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SurveyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('survey-form/{survey:slug}', [SurveyController::class,'getSurveyForm'])->name('surveyform.get');
Route::post('survey-form/{survey:slug}', [SurveyController::class,'storeSurveyAnswer'])->name('surveyform.submit');
