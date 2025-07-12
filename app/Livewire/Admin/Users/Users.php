<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\AdminComponent;
use App\Models\User;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('Users | Byte Zone')]
class Users extends AdminComponent
{
    use WithPagination;

    #[Url(as: 'q', except: '')]
    public $text = '';

    #[Session, Url(as: 'r', except: false)]
    public bool $showRestricted = false;

    public $user = null;

    public function getUsers(){
        return User::query()
            ->withTrashed()
            ->orderBy('name')
            ->where('is_admin', 0)
            ->when($this->text, function($query){
                $query->where('name', 'like', '%' . $this->text . '%');
            })
            ->when($this->showRestricted, function ($query) {
                $query->whereNotNull('deleted_at');
            })
            ->paginate(10);
    }

    public function toggleRestricted(){
        $this->showRestricted = !$this->showRestricted;
        $this->resetPage(pageName: 'users-page');
    }

    public function resetFilters(){
        $this->text = '';
        $this->showRestricted = false;
        $this->resetPage(pageName: 'users-page');
    }

    public function restrictUser($id){
        $this->authorize('restrict', User::class);
        $user = User::findorfail($id);
        $user->delete();
        $this->dispatch('flashMessage', message: 'User restricted successfully!');
    }

    public function restoreUser($id){
        $this->authorize('restore', User::class);
        $user = User::withTrashed()->findorfail($id);
        $user->restore();
        $this->dispatch('flashMessage', message: 'User restored successfully!');
    }

    public function getUser($id){
        return User::findorfail($id);
    }

    public function render()
    {
        return view('livewire.admin.users.users', [
            'users' => $this->getUsers()
        ]);
    }
}
