<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all();
        return $this->sendResponse('Retrieved Successfully',$instructors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorRequest $request)
    {
        $instructor = $request->validated();
        $instructor['image']= url('/Storage'.'/'.$request->image->store('insctuctors'));
        $instructor= Instructor::create($instructor);
        return $this->sendResponse('Created Successfully',$instructor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        return $this->sendResponse('Retrieved Successfully',$instructor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorRequest $request, Instructor $instructor)
    {
        $instructor->update($request->validated());
        return $this->sendResponse('Updated Successfully',$instructor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        $imagePath= Str::after($instructor->image,'Storage/');
        Storage::disk('public')->delete($imagePath);
        $instructor->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
