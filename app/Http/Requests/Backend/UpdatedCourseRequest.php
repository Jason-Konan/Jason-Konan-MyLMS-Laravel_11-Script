<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdatedCourseRequest extends FormRequest
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
            'name' => 'required|min:3|string',
            'thumbnail' => 'nullable|image',
            'price' => 'required|nullable',
            'description' => 'required|min:100',
            'level' => 'nullable|in:beginner,intermediate,advanced',
            'language' => 'nullable|in:en,fr,sp,it,ar',
            'category' => 'required|exists:categories_for_courses,id',
            'instructor' => 'required|exists:users,id'
        ];
    }
}
