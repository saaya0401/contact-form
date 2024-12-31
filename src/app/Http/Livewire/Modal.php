<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Category;

class Modal extends Component
{

    public $showModal = false;
    public $selectedContact=null;
    public $contact;
    public function mount($contact = null)
    {
        $this->contact = $contact;
    }

    public function render()
    {
        return view('livewire.modal' );
    }

    public function openModal($contactId)
    {
        $this->selectedContact=Contact::find($contactId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->selectedContact=null;
        $this->showModal = false;
    }

    public function deleteContact(){
        if($this->selectedContact){
            $this->selectedContact->delete();
            $this->showModal=false;
        }
    }
}
