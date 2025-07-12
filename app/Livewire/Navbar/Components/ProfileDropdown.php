<?php

namespace App\Livewire\Navbar\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileDropdown extends Component
{
    public $profileURL = '';

    public function mount(){
        $user = Auth::user();
        $this->profileURL = asset('storage/avatars/' . $user->avatar);
    }
    public function render()
    {
        return view('livewire.navbar.components.profile-dropdown');
    }
}
