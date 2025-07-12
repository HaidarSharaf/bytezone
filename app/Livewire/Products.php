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

    public $perPage = 8;
    public $hasMore = true;

    public function mount(){
        $this->loadProducts();
    }

    public function loadMore(){
        $this->perPage += 8;
        $this->loadProducts();
    }

    public function loadProducts(){
        $allProducts = Product::where('stock', '>', 0)
            ->orderBy('category_id', 'asc')
            ->take($this->perPage + 1)
            ->get();

        if ($allProducts->count() <= $this->perPage) {
            $this->hasMore = false;
        }

        $this->products = $allProducts->take($this->perPage);
        $this->inCart = $this->buildInCartArray($this->products);

        if ($allProducts->count() <= $this->perPage) {
            $this->hasMore = false;
        }
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

    public function render()
    {
        return view('livewire.products');
    }
}
