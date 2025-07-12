<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Order | Byte Zone')]
class OrderOverview extends Component
{

    public $order;
    public $products = [];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->products = json_decode($this->order->products);
    }

    public function getImage($id){
        $product = Product::findOrFail($id);
        return $product->images[0];
    }

    public function render()
    {
        if(Auth::user()->is_admin){
            return view('livewire.order-overview')
                ->layout('components.layouts.admin');
        }

        return view('livewire.order-overview');
    }
}
