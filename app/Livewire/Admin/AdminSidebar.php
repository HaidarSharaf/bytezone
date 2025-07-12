<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminSidebar extends Component
{
    public $profileURL = '';
    public $user = null;

    public function mount(){
        $this->user = Auth::user();
        $this->profileURL = asset('storage/avatars/' . $this->user->avatar);
    }

    public function render()
    {
        return view('livewire.admin.admin-sidebar');
    }
}
