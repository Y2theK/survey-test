<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function getSurveyForm(Survey $survey)
    {
        $surveys = Survey::with('questions')->findOrFail($survey->id);
        return view('surveyForm', compact('survey'));
    }
    public function storeSurveyAnswer(Request $request, Survey $survey)
    {
        dump($survey);
        return $request->all();
    }
}
