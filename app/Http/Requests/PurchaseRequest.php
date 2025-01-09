<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'date' => ['required'],
            'purchase_no' => ['required'],
            'supplier_id' => ['required'],
            'category_id' => ['required'],
            'product_id' => ['required'],
            'buying_qty' => ['required', 'array', 'min:1'],
            'unit_price' => ['required', 'array', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'Please Select the Date,',
            'purchase_no.required' => 'Please enter the purchase No.',
            'supplier_id.required' => 'Please Select the Supplier.',
            'category_id.required' => 'Please Select the Category',
            'product_id.required' => 'Please Select the Product.',
            'buying_qty.min' => 'Please Enter the Buying Quantity.',
            'unit_price.min' => 'Please Enter the unit price.'
        ];
    }
}
