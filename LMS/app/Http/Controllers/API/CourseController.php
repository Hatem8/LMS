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
        $course=Course::create($course);

        /**
         * de hna static 3lshan lsa m3ndnash 7aga esmha enroll in course
         */
        $user = User::find(1);
        $user->courses()->attach($course->id);


        return $this->sendResponse('Created Successfully',$course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course['category'] = $course->category->name;
        $course['faqs'] = $course->faqs;
        $course['lessons'] = $course->lessons;
        $course['quizzes'] = $course->quizzes;
        $reviews = $course->reviews;
        foreach($reviews as $review){
           $review['user']= $review->user;
        }
        $course['reviews']=$reviews;
        $course['usersNumber']=$course->users->count();
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
