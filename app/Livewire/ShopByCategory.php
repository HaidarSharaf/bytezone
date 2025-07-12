<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Shop By Category | Byte Zone')]
class ShopByCategory extends Component
{
    public $categories = [];

    public function mount(){
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.shop-by-category');
    }
}
