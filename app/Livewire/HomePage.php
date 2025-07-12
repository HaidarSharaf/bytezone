<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home | Byte Zone')]

class HomePage extends Component
{
    public $bestSellers = [];
    public $discountedProducts = [];

    public $discount;

    public function mount(){
        $this->discount = Product::max('discount');
        $this->bestSellers = Product::orderBy('price', 'desc')
                                ->where('stock', '>', 0)
                                ->take(8)
                                ->get();
        $this->discountedProducts = Product::where('discount' , '>', 0)
                                        ->where('stock', '>', 0)
                                        ->orderBy('price', 'desc')
                                        ->take(8)
                                        ->get();
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
