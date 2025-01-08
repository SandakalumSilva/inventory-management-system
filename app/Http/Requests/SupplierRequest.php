<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => ['required'],
            'mobile_no' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'address' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter supplier name.',
            'mobile_no.required' => 'Please enter supplier mobile number.',
            'mobile_no.numeric' => 'Please enter valid mobile number.',
            'email.required' => 'Please enter supplier email address.',
            'email.email' => 'Please enter valid email address.',
            'address' => 'Please enter supplier address.'
        ];
    }
}
