<?php

namespace App\Livewire\Admin\Products;

use App\Livewire\AdminComponent;
use App\Livewire\Forms\ProductForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Edit Product | Byte Zone')]
class EditProduct extends AdminComponent
{
    use WithFileUploads;

    public ProductForm $form;

    public $brands = [];
    public $categories = [];

    public function mount(Product $product)
    {
        $this->form->setProduct($product);
        $this->brands = Brand::all();
        $this->categories = Category::all();
    }

    public function save(){
        $this->authorize('update', Product::class);
        $this->form->update();
        $this->redirect(route('admin.all-products'), navigate: true);
    }

    public function removeImage($index){
        if (isset($this->form->images_path[$index])) {
            $this->form->images_to_remove[] = $this->form->images_path[$index];
            unset($this->form->images_path[$index]);
            $this->form->images_path = array_values($this->form->images_path);
        }
    }

    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
