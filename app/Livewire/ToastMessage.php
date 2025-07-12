<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ToastMessage extends Component
{
    public $message;

    #[On('flashMessage')]
    public function flash($message){
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.toast-message');
    }
}
