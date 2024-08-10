<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Traits\ApiResponseTrait;
use App\Models\Lesson;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $lessons = Lesson::all();
        return $this->sendResponse('Retrieved Successfully',$lessons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonRequest $request)
    {
        $lesson = Lesson::create($request->validated());
        return $this->sendResponse('Created Successfully',$lesson);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return $this->sendResponse('Retrieved Successfully',$lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->validated());
        return $this->sendResponse('Updated Successfully',$lesson);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
