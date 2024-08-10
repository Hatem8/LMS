<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCommentRequest;
use App\Models\BlogComment;
use App\Traits\ApiResponseTrait;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $blogComments = BlogComment::all();
        return $this->sendResponse('Retrieved Successfully',$blogComments);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCommentRequest $request)
    {
        $comment = BlogComment::create($request->validated());
        return $this->sendResponse('Created Successfully',$comment);
    }

    /**
     * Display the specified resource.
     */
    public function show($commentId)
    {
        $comment = BlogComment::findOrFail($commentId);
        return $this->sendResponse('Retrieved Successfully',$comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogCommentRequest $request, $commentId)
    {
        $comment = BlogComment::findOrFail($commentId);
        $comment ->update($request->validated());
        return $this->sendResponse('Updated Successfully',$comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($commentId)
    {
        $comment = BlogComment::findOrFail($commentId);
        $comment ->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
