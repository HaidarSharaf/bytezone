<?php

namespace App\Livewire\Navbar\Components;

use App\Traits\CartManager;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCount extends Component
{
    use CartManager;
    public $cartCount = 0;

    public function mount(){
        $this->cartCount = $this->getCartCount();
    }

    #[On('cartUpdated')]
    public function updateCartCount(){
        $this->cartCount = $this->getCartCount();
    }


    public function render()
    {
        return view('livewire.navbar.components.cart-count');
    }
}
