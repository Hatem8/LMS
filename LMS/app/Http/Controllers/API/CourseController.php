<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Traits\ApiResponseTrait;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $courses = Course::all();
        return $this->sendResponse('Retrieved Successfully',$courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $course = Course::create($request->validated());
        return $this->sendResponse('Created Successfully',$course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return $this->sendResponse('Retrieved Successfully',$course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return $this->sendResponse('Updated Successfully',$course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
