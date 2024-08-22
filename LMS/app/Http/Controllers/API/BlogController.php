<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;

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
        $blog= $request->validated();
        $blog['image'] = url('/Storage'.'/'.$request->image->store('blogs'));
        Blog::create($blog);
        return $this->sendResponse('Created Successfully',$blog);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

        $comments = $blog->blog_comments;
        foreach($comments as $comment){
            $comment['user'] = $comment->user;
        }
        $blog['blog_comments'] = $comments;


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
