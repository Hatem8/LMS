<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:20|min:3',
            'title'=> 'required|string|min:3|max:20',
            'duration' => 'required',
            'overview' => 'required|string|min:10',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'image' => 'required|file|mimes:png,jpg,jpeg|max:10000',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
