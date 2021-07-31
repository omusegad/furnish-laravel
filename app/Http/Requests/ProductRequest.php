<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'product_category_id' => 'integer|required',
            'product_name' => 'string|required',
            'description' => 'string|required',
            'product_image' => 'required|mimes:jpg,png,jpeg,gif,svg',
            'regular_price'  => 'numeric|required',
            'offer_percentage'  => 'numeric|required'
        ];
    }
}
