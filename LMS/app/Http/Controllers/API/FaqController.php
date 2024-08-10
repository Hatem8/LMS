<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use App\Traits\ApiResponseTrait;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        $faqs = Faq::all();
        return $this->sendResponse('Retrieved Successfully',$faqs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $faq = Faq::create($request->validated());
        return $this->sendResponse('Created Successfully',$faq);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        return $this->sendResponse('Retrieved Successfully',$faq);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return $this->sendResponse('Updated Successfully',$faq);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return $this->sendResponse('Deleted Successfully');
    }
}
