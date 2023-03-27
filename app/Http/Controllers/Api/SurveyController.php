<?php

namespace App\Http\Controllers\Api;

use App\Http\Helper\ApiResponseHelper;
use App\Models\Survey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SurveyResource;
use App\Http\Requests\SurveyCreateRequest;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return ApiResponseHelper::success('Get All Surveys', ['surveys' =>  SurveyResource::collection($surveys)], 200);
    }

    public function store(SurveyCreateRequest $request)
    {
        $validated_data = $request->validated();
        $survey = Survey::create([
            'name' => $validated_data['name'],
            'slug' => Str::slug($validated_data['name']).'-'.uniqid(),
            'user_id' => $request->user()->id
         ]);
        
        foreach ($validated_data['questions'] as $question) {
            $question['survey_id'] = $survey->id;
            $this->createQuestion($question);
        }
        return ApiResponseHelper::success('Survey Created', new SurveyResource($survey), 201);
    }
    private function createQuestion($question)
    {
        $validated_data= Validator::make($question, [
            'question' => 'required|string',
            'survey_id' => 'required|exists:surveys,id',
            'type' => 'required|in:text,date,number'
        ])->validate();

        $question = Question::create($validated_data);
        return $question;
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        return ApiResponseHelper::success('Get Survey', new SurveyResource($survey), 200);
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey, Request $request)
    {
        if ($request->user()->id !== $survey->user_id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }
        $survey->questions()->delete();
        $survey->delete();
        // return response()->json([
        //     'message' => 'Survey deleted'
        // ], 200);
        return ApiResponseHelper::success('Survey Deleted', null, 200);
    }
}
