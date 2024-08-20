<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Review;
use App\Models\User;
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
        $course =$request->validated();
        $course['image']= url('/Storage'.'/'.$request->image->store('courses'));
        Course::create($course);
        return $this->sendResponse('Created Successfully',$course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course['category'] = Category::where('id',$course->category_id)->get();
        $course['faq'] = Faq::where('course_id',$course->id)->get();
        $course['lessons'] = Lesson::where('course_id',$course->id)->get();
        $course['quizzes']= Quiz::where('course_id',$course->id)->get();
        $reviews = Review::where('course_id',$course->id)->get();
        for( $i=0; $i < $reviews->count() ; $i++){
            $reviews[$i]['user']= User::where('id',$reviews[$i]->user_id)->get();
        }
        $course['reviews']=$reviews;


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
