<?php

namespace App\Http\Requests\Basket;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BasketStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'price'        => 'required|integer',
            'quantity'     => 'required|integer',
            'user_id'      => 'integer',
            'product_id'   => 'required|integer',
        ];
    }
}
