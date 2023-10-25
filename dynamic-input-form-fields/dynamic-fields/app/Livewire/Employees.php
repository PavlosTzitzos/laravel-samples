<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;

class Employees extends Component
{
    public $employees, $name, $email, $employee_id;
    public $updateMode = false;
    public $inputs = [];
    public $i = 1;
 
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
 
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
 
    public function render()
    {
        $this->employees = Employee::all();
        return view('livewire.employees');
    }
 
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }
 
    public function store()
    {
        $validatedDate = $this->validate([
                'name.0' => 'required',
                'email.0' => 'required',
                'name.*' => 'required',
                'email.*' => 'required|email',
            ],
            [
                'name.0.required' => 'name field is required',
                'email.0.required' => 'email field is required',
            'email.0.email' => 'The email must be a valid email address.',
                'name.*.required' => 'name field is required',
                'email.*.required' => 'email field is required',
                'email.*.email' => 'The email must be a valid email address.',
            ]
        );
 
        foreach ($this->name as $key => $value) {
            Employee::create(['name' => $this->name[$key], 'email' => $this->email[$key]]);
        }
 
        $this->inputs = [];
 
        $this->resetInputFields();
 
        session()->flash('message', 'Employee Has Been Created Successfully.');
    }
    // public function render()
    // {
    //     return view('livewire.employees');
    // }
}
