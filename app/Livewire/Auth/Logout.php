<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{

    public function logout(){
        Auth::logout();
        if(session()->has('admin-is-verified')){
            session()->forget('admin-is-verified');
        }
        $this->redirect(route('home'), navigate: true);
    }
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
