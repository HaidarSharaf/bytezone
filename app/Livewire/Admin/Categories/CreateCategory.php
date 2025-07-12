<?php

namespace App\Livewire\Admin\Categories;

use App\Livewire\AdminComponent;
use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Create Category | Byte Zone')]
class CreateCategory extends AdminComponent
{
    use WithFileUploads;

    public CategoryForm $form;

    public function save(){
        $this->authorize('create', Category::class);
        $this->form->store();
        $this->redirect(route('admin.categories'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.categories.create-category');
    }
}
