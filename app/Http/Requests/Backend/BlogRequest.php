<?php

namespace App\Http\Requests\Backend;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->slug ?? $this->title),
        ]);
    }
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
            'slug' => ['required', 'string', 'between:3,255', 'unique:blogs'],
            'content' => ['required', 'string', 'min:255'],
            'thumbnail' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg,vif'],
            'category' => 'required|exists:category_for_blogs,id',
        ];
    }
}
