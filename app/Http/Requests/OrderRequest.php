<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'container' => 'required|integer|exists:App\Models\Product,id',
            'scoops' => 'required|array|between:1,3',
            'scoops.*' => 'integer|exists:App\Models\Product,id',
            'toppings' => 'sometimes|array',
            'toppings.*' => 'integer|exists:App\Models\Product,id'
        ];
    }
}
