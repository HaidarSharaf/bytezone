<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Traits\CartManager;

class ProductsSlider extends Component
{
    use CartManager;

    public $products = [];
    public $inCart = [];

    public $perSlide = 3;
    public $active = 0;
    public $chunkCount;

    public function mount(){
        $this->inCart = $this->buildInCartArray($this->products);
    }

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

    public function setPerSlide($value){
        $this->perSlide = (int) $value;
    }

    public function render()
    {
        $chunked = collect($this->products)->chunk($this->perSlide);
        $this->chunkCount = $chunked->count();

        return view('livewire.products-slider', [
            'chunkedProducts' => $chunked,
        ]);
    }
}
