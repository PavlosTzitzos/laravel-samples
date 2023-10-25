<?php

namespace App\Livewire;

use Livewire\Component;

class DynamicInputs extends Component
{
    public Collection $inputs;

    public function addInput()
    {
        $this->inputs->push(['email' => '']);
    }

    public function removeInput($key)
    {
        $this->inputs->pull($key);
    }

    public function mount()
    {
        $this->fill([
            'inputs' => collect([['email' => '']]),
        ]);
    }

    protected $rules = [
        'inputs.*.email' => 'required',
    ];
    
    protected $messages = [
        'inputs.*.email.required' => 'This email field is required.',
    ];
    
    public function submit()
    {
        $this->validate();
    }
    
    public function render()
    {
        return view('livewire.dynamic-inputs');
    }
}
