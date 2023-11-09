<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowFormRequest extends FormRequest
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
            'show_name' => 'required',
            'show_description' => 'nullable',
            'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'producer_ids' => 'required|array|min:1',
            'producer_ids.*' => 'required|distinct|max:4',
        ];

        return $rules;
    }
}
