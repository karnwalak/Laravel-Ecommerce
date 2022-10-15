<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'category' => ['required','not_in:0'],
            'product_name' => ['required'],
            'product_slug' => ['required'],
            'brand' => ['required','not_in:0'],
            'small_description' => ['required'],
            'description' => ['required'],
            'meta_title' => ['required'],
            'meta_keyword' => ['required'],
            'meta_description' => ['required'],
            'original_price' => ['required','integer'],
            'selling_price' => ['required','integer'],
            'quantity' => ['required','integer'],
        ];
    }
}
