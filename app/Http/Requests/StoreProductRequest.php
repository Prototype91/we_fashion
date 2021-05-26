<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required|string',
            'price' => 'required|float',
            'published' => 'boolean',
            'discount' => 'boolean',
            'size' => 'in:XS,S,M,L,XL',
            'category' => 'in:male,female'
        ];
    }
}
