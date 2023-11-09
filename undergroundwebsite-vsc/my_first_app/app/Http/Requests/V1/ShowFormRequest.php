<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowFormRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if($method == 'POST')
        {
            return [
                'showName' => 'required',
                'showDescription' => 'nullable',
                'showLogo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
                'producerIds' => 'nullable|array|min:1',
                'producerIds.*' => 'nullable|distinct|max:4',
            ];
        }
        elseif($method == 'PUT')
        {
            return [
                'showName' => 'required',
                'showDescription' => 'nullable',
                'showLogo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
                'producerIds' => 'nullable|array|min:1',
                'producerIds.*' => 'nullable|distinct|max:4',
            ];
        }
        elseif($method == 'PATCH')
        {
            return [
                'showName' => 'sometimes|required',
                'showDescription' => 'sometimes|nullable',
                'showLogo' => 'sometimes|nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
                'producerIds' => 'sometimes|nullable|array|min:1',
                'producerIds.*' => 'sometimes|nullable|distinct|max:4',
            ];
        }
    }
    /**
     * Matches the client data to model data
     */
    protected function prepareForValidation()
    {
        if($this->showName){
            $this->merge([
                'show_name' => $this->showName
            ]);
        }
        if($this->showDescription){
            $this->merge([
                'show_description' => $this->showDescription
            ]);
        }
        if($this->showLogo){
            $this->merge([
                'show_logo' => $this->showLogo
            ]);
        }
        if($this->producerIds){
            $this->merge([
                'producer_ids' => $this->producerIds,
            ]);
        }
    }
}
