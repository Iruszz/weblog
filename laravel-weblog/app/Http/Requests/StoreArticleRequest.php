<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required|exists:categories,id',
            'is_premium' => 'nullable|boolean',
        ];
    }
}
