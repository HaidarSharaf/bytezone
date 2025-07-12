<?php

namespace App\Livewire\Admin\Brands;

use App\Livewire\AdminComponent;
use App\Livewire\Forms\BrandForm;
use App\Models\Brand;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Edit Brand | Byte Zone')]
class EditBrand extends AdminComponent
{
    use WithFileUploads;
    public BrandForm $form;

    public function mount(Brand $brand){
        $this->form->setBrand($brand);
    }

    public function save(){
        $this->authorize('update', Brand::class);
        $this->form->update();
        $this->redirect(route('admin.brands'), navigate: true);;
    }

    public function render()
    {
        return view('livewire.admin.brands.edit-brand');
    }
}
