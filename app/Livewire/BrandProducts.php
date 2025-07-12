<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;


class BrandProducts extends Component
{
    public ?Brand $brand;
    public $products = [];

    public function mount(Brand $brand){
        $this->brand = $brand;
        $this->getProducts();
    }

    public function getProducts(){
        $this->products = $this->brand->products()->get();
    }

    public function render()
    {
        return view('livewire.brand-products')
            ->title($this->brand->name . ' Products | Byte Zone');
    }
}
