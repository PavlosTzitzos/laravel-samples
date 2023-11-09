<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramFormRequest extends FormRequest
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
                'dayOfTheWeek' => 'required',
                'showStartTime' => 'required',
                'showEndTime' => 'required',
                'showId' => 'required'
            ];
        }
        elseif($method == 'PUT')
        {
            return [
                'dayOfTheWeek' => 'required',
                'showStartTime' => 'required',
                'showEndTime' => 'required',
                'showId' => 'required'
            ];
        }
        elseif($method == 'PATCH')
        {
            return [
                'dayOfTheWeek' => 'sometimes|required',
                'showStartTime' => 'sometimes|required',
                'showEndTime' => 'sometimes|required',
                'showId' => 'sometimes|required'
            ];
        }
    }/**
     * Matches the client data to model data
     */
    protected function prepareForValidation()
    {
        if($this->dayOfTheWeek){
            $this->merge([
                'program_weekday' => $this->dayOfTheWeek
            ]);
        }
        if($this->showStartTime){
            $this->merge([
                'show_start_time' => $this->showStartTime
            ]);
        }
        if($this->showEndTime){
            $this->merge([
                'show_end_time' => $this->showEndTime
            ]);
        }
        if($this->showId){
            $this->merge([
                'show_id' => $this->showId
            ]);
        }
    }
}
