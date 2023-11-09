<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProducerFormRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required',
            'second_name' => 'nullable',
            'last_name' => 'required',
            'phone_number' => 'nullable|numeric',
            'email' => 'nullable',
            'producer_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ];

        return $rules;
    }
}
