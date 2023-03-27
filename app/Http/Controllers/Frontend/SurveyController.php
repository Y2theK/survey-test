<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;

class SurveyController extends Controller
{
    public function getSurveyForm(Survey $survey)
    {
        $surveys = Survey::with('questions')->findOrFail($survey->id);
        return view('surveyForm', compact('survey'));
    }
    public function storeSurveyAnswer(AnswerRequest $request, Survey $survey)
    {
        $validated_data =  $request->validated();
        $answer = Answer::create([
         'survey_id' =>  $survey->id
        ]);

        foreach ($validated_data['answers'] as $questionId => $answer) {
            QuestionAnswer::create([
                'question_id' => $questionId,
                'answer_id' => $answer->id,
                'answer' => $answer
            ]);
        }
        return view('thankyou');
    }
}
