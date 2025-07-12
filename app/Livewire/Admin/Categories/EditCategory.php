<?php

namespace App\Livewire\Admin\Categories;

use App\Livewire\AdminComponent;
use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Edit Category | Byte Zone')]
class EditCategory extends AdminComponent
{
    use WithFileUploads;
    public CategoryForm $form;

    public function mount(Category $category){
        $this->form->setCategory($category);
    }

    public function save(){
        $this->authorize('update', Category::class);
        $this->form->update();
        $this->redirect(route('admin.categories'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.categories.edit-category');
    }
}
