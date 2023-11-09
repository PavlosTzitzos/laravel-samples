<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProducerFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && ( $user->tokenCan('create') || $user->tokenCan('update') );
    }

    /**
     * Get the validation rules that apply to the request (data from client).
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method == 'POST')
        {
            return [
                'firstName' => 'required',
                'secondName' => 'nullable',
                'lastName' => 'required',
                'description' => 'nullable',
                'phoneNumber' => 'nullable|numeric',
                'email' => 'nullable',
                'producerImage' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            ];
        }
        elseif($method == 'PUT')
        {
            return [
                'firstName' => 'required',
                'secondName' => 'nullable',
                'lastName' => 'required',
                'description' => 'nullable',
                'phoneNumber' => 'nullable|numeric',
                'email' => 'nullable',
                'producerImage' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            ];
        }
        elseif($method == 'PATCH')
        {
            return [
                'firstName' => 'sometimes|required',
                'secondName' => 'sometimes|required',
                'lastName' => 'sometimes|required',
                'description' => 'sometimes|required',
                'phoneNumber' => 'sometimes|required|numeric',
                'email' => 'sometimes|nullable',
                'producerImage' => 'sometimes|required|image|mimes:jpeg,jpg,png,gif|max:2048',
            ];
        }
    }

    /**
     * Matches the client data to model data
     */
    protected function prepareForValidation()
    {
        if($this->firstName){
            $this->merge([
                'first_name' => $this->firstName
            ]);
        }
        if($this->secondName){
            $this->merge([
                'second_name' => $this->secondName
            ]);
        }
        if($this->lastName){
            $this->merge([
                'last_name' => $this->lastName
            ]);
        }
        if($this->description){
            $this->merge([
                'description' => $this->description
            ]);
        }
        if($this->phoneNumber){
            $this->merge([
                'phone_number' => $this->phoneNumber
            ]);
        }
        if($this->email){
            $this->merge([
                'email' => $this->email
            ]);
        }
        if($this->photoImage){
            $this->merge([
                'photo_image' => $this->photoImage
            ]);
        }
    }
}
