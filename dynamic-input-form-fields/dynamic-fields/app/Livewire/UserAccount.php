<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Account;

class UserAccount extends Component
{
    public $accounts, $account, $username, $account_id;
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

    private function resetInputFields(){
        $this->account = '';
        $this->username = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
                'account.0' => 'required',
                'username.0' => 'required',
                'account.*' => 'required',
                'username.*' => 'required',
            ],
            [
                'account.0.required' => 'Account field is required',
                'username.0.required' => 'Username field is required',
                'account.*.required' => 'Account field is required',
                'username.*.required' => 'Username field is required',
            ]
        );
   
        foreach ($this->account as $key => $value) {
            Account::create(['account' => $this->account[$key], 'username' => $this->username[$key]]);
        }
  
        $this->inputs = [];
   
        $this->resetInputFields();
   
        session()->flash('message', 'Account Added Successfully.');
    }

    public function render()
    {
        $data = Account::all();
        return view('livewire.user-account',['data' => $data]);
    }
    // public function render()
    // {
    //     return view('livewire.user-account');
    // }
}
