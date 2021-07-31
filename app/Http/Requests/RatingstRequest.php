<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingstRequest extends FormRequest
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
            'user_id'    => 'integer|required',
            'product_id' => 'integer|required',
            'rating'     => 'integer|required',
            'comment'    => 'string|required',
        ];
    }
}
