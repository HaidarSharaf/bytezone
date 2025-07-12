<?php

namespace App\Livewire\Auth;

use App\Livewire\AuthComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Admins Secret Key | Byte Zone')]
class AdminSecretKey extends AuthComponent
{
    #[Rule('required|string')]
    public $secret;

    public function verify()
    {
        $this->validate();
        $admin = auth()->user()->admin;
        if (Hash::check($this->secret, $admin->secret_code)) {
            session(['admin-is-verified' => 'true']);
            $this->redirect(route('admin.dashboard'), navigate: true);
        } else {
            $this->addError('secret', 'Invalid secret code.');
        }
    }

    public function render()
    {
        return view('livewire.auth.admin-secret-key');
    }
}
