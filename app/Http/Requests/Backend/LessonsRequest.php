<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class LessonsRequest extends FormRequest
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
            'thumbnail' => 'required|file',
            'title' => 'required|string|max:255|unique:lessons,title,NULL,id,section_id,' . $this->section->id,
            'description' => 'required|string|min:100',
            // 'section' => 'required|exists:sections,id'
        ];
    }
}
