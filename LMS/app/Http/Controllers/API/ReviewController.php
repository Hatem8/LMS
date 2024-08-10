<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $reviews = Review::all();
        return $this->sendResponse('Retrieved Successfully',$reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        $review = Review::create($request->validated());
        return $this->sendResponse('Created Successfully',$review);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return $this->sendResponse('Retrieved Successfully',$review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->validated());
        return $this->sendResponse('Updated Successfully',$review);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
