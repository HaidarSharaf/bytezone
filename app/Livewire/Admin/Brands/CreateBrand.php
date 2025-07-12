<?php

namespace App\Livewire\Admin\Brands;

use App\Livewire\AdminComponent;
use App\Livewire\Forms\BrandForm;
use App\Models\Brand;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Create Brand | Byte Zone')]
class CreateBrand extends AdminComponent
{
    use WithFileUploads;

    public BrandForm $form;

    public function save(){
        $this->authorize('create', Brand::class);
        $this->form->store();
        $this->redirect(route('admin.brands'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.brands.create-brand');
    }
}
