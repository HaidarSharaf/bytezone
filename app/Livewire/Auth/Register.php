<?php

namespace App\Livewire\Auth;

use App\Traits\CartManager;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;
use App\Livewire\AuthComponent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Register | Byte Zone')]
class Register extends AuthComponent
{
    use CartManager;

    #[Rule('required|string|max:255')]
    public $name = '';

    #[Rule('required|string|email|max:255|unique:users,email')]
    public $email = '';

    #[Rule(['required' ,'unique:users,phone_number', 'regex:/^(03|70|71|76|78|79|81)\\d{6}$/'])]
    public $phone_number;

    #[Rule('required|string|min:8|confirmed')]
    public $password = '';
    public $password_confirmation = '';

    public $notifications = false;

    public function create(){
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => '+961 ' . $this->phone_number,
            'password' => $this->password,
            'avatar' => $this->email . '.png',
            'notifications' => $this->notifications,
        ]);

        $this->mergeSessionCartWithUserCart();

        $avatar = Avatar::create($user->name)
            ->setDimension(100, 100)
            ->toBase64();

        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));

        Storage::disk('public')->put("avatars/{$user->id}.png", $image);
        $user->update(['avatar' => $user->id . '.png']);

        Auth::login($user);

        session()->flash('message', 'Registration successful!');

        $this->redirectIntended(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
