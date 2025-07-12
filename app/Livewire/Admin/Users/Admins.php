<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\AdminComponent;
use App\Models\Admin;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Admins | Byte Zone')]
class Admins extends AdminComponent
{
    use WithPagination;

    public function demoteAdmin($id){
        $this->authorize('demote', Admin::class);
        $user = User::findorfail($id);
        $user->admin()->delete();
        $user->is_admin = 0;
        $user->save();
        $this->dispatch('flashMessage', message: 'Admin demoted successfully!');
        $this->redirect(route('admin.admins'), navigate: true);
    }

    public function getAdmins(){
        return User::where('is_admin', 1)
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.users.admins', [
            'users' => $this->getAdmins()
        ]);
    }
}
