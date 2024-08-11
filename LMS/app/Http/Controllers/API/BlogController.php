<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Traits\ApiResponseTrait;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $blogs = Blog::all();
        return $this->sendResponse('Retrieved Successfully',$blogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $blog = Blog::create($request->validated());
        return $this->sendResponse('Created Successfully',$blog);

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blogComments = BlogComment::where('blog_id',$blog->id)->get();
        $blog['comments'] = $blogComments;
        return $this->sendResponse('Retrieved Successfully',$blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
            $blog ->update($request->validated());
            return $this->sendResponse('Updated Successfully',$blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog ->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
