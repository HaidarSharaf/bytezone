<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class CategoryProducts extends Component
{
    public ?Category $category;
    public $products = [];

    public function mount(Category $category){
        $this->category = $category;
        $this->getProducts();
    }

    public function getProducts(){
        $this->products = $this->category->products()->get();
    }

    public function render()
    {
        return view('livewire.category-products')
            ->title($this->category->name . ' | Byte Zone');
    }
}
