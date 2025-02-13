<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required', 'string', 'between:3,255'],
            'slug' => ['nullable', 'string', 'between:3,255'],
            'content' => ['required', 'string', 'min:10'],
            'thumbnail' => ['nullable', 'image'],
            'category' => 'required|exists:category_for_blogs,id',
        ];
    }
}
