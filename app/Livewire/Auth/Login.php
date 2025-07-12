<?php

namespace App\Livewire\Auth;

use App\Livewire\AuthComponent;
use App\Traits\CartManager;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Login | Byte Zone')]
class Login extends AuthComponent
{
    use CartManager;

    #[Rule('required|string|email')]
    public $email = '';

    #[Rule('required|string')]
    public $password = '';

    #[Rule('boolean')]
    public $remember = false;

    public function login(){
        $this->validate();

        $valid = Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember);

        if($valid){
            $this->mergeSessionCartWithUserCart();
            $this->dispatch('flashMessage', message: 'Logged In Successfully!');
            if(Auth::user()->is_admin){
                return $this->redirect(route('admin.secret-key'), navigate: true);
            }

           return $this->redirect(route('home'), navigate: true);

        } else {
            $this->addError('email', 'These credentials do not match our records.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
