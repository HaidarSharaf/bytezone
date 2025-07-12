<?php

namespace App\Livewire\Admin\Products;

use App\Livewire\AdminComponent;
use App\Livewire\Forms\ProductForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Create Product | Byte Zone')]
class CreateProduct extends AdminComponent
{
    use WithFileUploads;

    public ProductForm $form;

    public $brands = [];
    public $categories = [];

    public function mount(){
        $this->brands = Brand::all();
        $this->categories = Category::all();
    }


    public function save(){
        $this->authorize('create', Product::class);
        $this->form->store();
        $this->redirect(route('admin.all-products'), navigate: true);
    }

    public function removeImage($index){
        if(isset($this->form->images[$index])){
            unset($this->form->images[$index]);
        }
    }

    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
