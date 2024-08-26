<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Models\Quiz;
use App\Traits\ApiResponseTrait;


class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $quizzes = Quiz::all();
        return $this->sendResponse('Retrieved Successfully',$quizzes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizRequest $request)
    {
        $quiz = $request->validated();
        $quiz['image']= url('/Storage'.'/'.$request->image->store('quizzes'));
        $quiz=Quiz::create($quiz);
        return $this->sendResponse('Created Successfully',$quiz);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        return $this->sendResponse('Retrieved Successfully',$quiz);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizRequest $request, Quiz $quiz)
    {
        $quiz->update($request->validated());
        return $this->sendResponse('Updated Successfully',$quiz);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
