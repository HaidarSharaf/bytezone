<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Traits\CartManager;

class Products extends Component
{
    use CartManager;

    public $products = [];
    public $inCart = [];


    public function addProduct($id){
        $product = Product::find($id);
        $this->addToCart($product);
        $this->inCart = $this->buildInCartArray($this->products);
        $this->dispatch('flashMessage', message: 'Product added to cart!');
        $this->dispatch('cartUpdated');
    }


    public function getDiscountedPrice($price, $discount){
        return number_format($price - ($price * $discount / 100), 2);
    }

    public function render()
    {
        return view('livewire.products');
    }
}
