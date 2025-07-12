<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Shop By Brand | Byte Zone')]
class ShopByBrand extends Component
{
    public $brands = [];

    public function mount()
    {
        $this->brands = Brand::all();
    }

    public function render()
    {
        return view('livewire.shop-by-brand');
    }
}
