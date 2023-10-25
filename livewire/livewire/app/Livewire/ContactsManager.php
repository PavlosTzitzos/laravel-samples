<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactsManager extends Component
{
    public $contacts;

    protected $rules = [
        'contacts.*.name' => 'required',
        'contacts.*.email' => 'required|email'
    ];

    public function delete($index)
    {
        $contact = $this->contacts[$index];
        $this->contacts->forget($index);

        $contact->delete();

        session()->flash('success','The data has been deleted successfully.');
    }

    public function save()
    {
        $this->validate();

        foreach($this->contacts as $contact)
        {
            $contact->save();
        }

        session()->flash('success','The data has been saved successfully.');
    }

    public function add()
    {
        $this->contacts->push(new Contact());
    }

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    public function render()
    {
        return view('livewire.contacts-manager');
    }
}
