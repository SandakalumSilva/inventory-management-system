<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name.required' => 'Please enter customer name.',
            'mobile_no.required' => 'Please enter customer mobile number.',
            'mobile_no.numeric' => 'Please enter valid mobile number.',
            'email.required' => 'Please enter customer email.',
            'email.email' => 'Please enter valid email.',
            'address.required' => 'Please enter custoemr address'
        ];
    }
}
