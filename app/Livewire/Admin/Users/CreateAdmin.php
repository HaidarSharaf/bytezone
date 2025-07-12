<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\AdminComponent;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Facade as Avatar;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Create Admin | Byte Zone')]
class CreateAdmin extends AdminComponent
{
    #[Rule('required|string|max:255')]
    public $name = '';

    #[Rule('required|string|email|max:255|unique:users,email')]
    public $email = '';

    #[Rule(['required' ,'unique:users,phone_number', 'regex:/^(03|70|71|76|78|79|81)\\d{6}$/'])]
    public $phone_number;

    #[Rule('required|string|min:8|confirmed')]
    public $password = '';
    public $password_confirmation = '';

    #[Rule('required|string|min:6')]
    public $secret = '';

    public function create(){
        $this->authorize('create', Admin::class);
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => '+961 ' . $this->phone_number,
            'password' => $this->password,
            'is_admin' => 1,
            'email_verified_at' => now(),
            'avatar' => $this->email . '.png',
        ]);

        $avatar = Avatar::create($user->name)
            ->setDimension(100, 100)
            ->toBase64();

        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));

        Storage::disk('public')->put("avatars/{$user->id}.png", $image);
        $user->update(['avatar' => $user->id . '.png']);

        $user->admin()->create([
            'user_id' => $user->id,
            'role_id' => 2,
            'secret_code' => Hash::make($this->secret)
        ]);

        $this->redirect(route('admin.admins'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.users.create-admin');
    }
}
