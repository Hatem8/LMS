<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $categories = Category::all();
        return $this->sendResponse('Retrieved Successfully',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return $this->sendResponse('Created Successfully',$category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->sendResponse('Retrieved Successfully',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category ->update($request->validated());
        return $this->sendResponse('Updated Successfully',$category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category ->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
