<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'slug' => ['required'],
            'description' => ['required'],
            'file' => ['mimes:png,jpg','max:2048'],
            'meta_title' => ['required'],
            'meta_keyword' => ['required'],
            'meta_description' => ['required'],
        ];
    }
}
