<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('All Products | Byte Zone')]
class AllProducts extends Component
{
    public $products = [];

    public function mount(){
        $this->products = Product::where('stock', '>' , 0)
                            ->orderBy('category_id', 'asc')
                            ->get();
    }

    public function render()
    {
        return view('livewire.all-products');
    }
}
