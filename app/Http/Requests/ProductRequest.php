<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'supplier_id' => ['required'],
            'name' => ['required'],
            'unit_id' => ['required'],
            'category_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter Product Name.',
            'supplier_id.required' => 'Please select Supplier.',
            'unit_id.required' => 'Please select Unit',
            'category_id.required' => 'Please select category.'
        ];
    }
}
