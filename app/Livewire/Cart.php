<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Traits\CartManager;

#[Title('Shopping Cart | Byte Zone')]
class Cart extends Component
{
    use CartManager;
    public $products = [];

    public function mount(){
        $this->refreshCart();
    }

    public function refreshCart(){
        $this->products = $this->getCartProductModels();
    }

    public function increment($productId)
    {
        $this->incrementProduct($productId);
        $this->refreshCart();
    }

    public function decrement($productId)
    {
        $this->decrementProduct($productId);
        $this->refreshCart();
    }

    public function removeProduct($productId)
    {
        $this->removeFromCart($productId);
        $this->refreshCart();
        $this->dispatch('flashMessage', message: 'Product Removed From cart!');
        $this->dispatch('cartUpdated');
    }

    public function getDiscountedPrice($price, $discount){
        return $price - ($price * $discount / 100);
    }

    public function checkout()
    {
        if (count($this->products) > 0) {

            if (!Auth::check()) {
                return $this->$this->redirect(route('register'), navigate: true);            }

            if (!Auth::user()->hasVerifiedEmail()) {
                return $this->redirect(route('verify-email'), navigate: true);
            }

            return $this->redirect(route('checkout'), navigate: true);
        }
    }


    public function render()
    {
        return view('livewire.cart');
    }
}
