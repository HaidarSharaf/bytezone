<?php

namespace App\Livewire;

use App\Models\Product;
use App\Traits\CartManager;
use Livewire\Component;

class ProductOverview extends Component
{
    use CartManager;

    public ?Product $product;
    public $inCart = false;
    public $relatedProducts = [];

    public function mount(Product $product){
        $this->product = $product;
        $this->inCart = $this->isInCart($this->product->id);
        $this->relatedProducts = Product::where(function($query) use ($product){
                                    $query->where('category_id', $product->category_id)
                                    ->orWhere('brand_id', $product->brand_id);
                                })
                                ->where('id', '!=', $product->id)
                                ->where('stock', '>', 0)
                                ->limit(6)
                                ->get();
    }

    public function addProduct(){
        if($this->product && !$this->inCart){
            $this->addToCart($this->product);
            $this->inCart = true;
            $this->dispatch('flashMessage', message: 'Product added to cart!');
            $this->dispatch('cartUpdated');
        }
    }

    public function getDiscountedPrice($price, $discount){
        return number_format($price - ($price * $discount / 100), 2);
    }

    public function render()
    {
        return view('livewire.product-overview')
            ->title($this->product->name . ' | Byte Zone');
    }
}
