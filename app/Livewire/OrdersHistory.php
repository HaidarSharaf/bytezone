<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Orders History | Byte Zone')]
class OrdersHistory extends Component
{
    use WithPagination;

    #[Url(as: 't', except: '')]
    public $orders_time = '';

    public function getOrders(){
        return Order::query()
            ->orderBy('created_at', 'desc')
            ->where('user_id', auth()->user()->id)
            ->when($this->orders_time === 'this_week', function ($query) {
                $query->whereBetween('created_at', [
                    now()->startOfWeek(),
                    now()->endOfWeek(),
                ]);
            })
            ->when($this->orders_time === 'this_month', function ($query) {
                $query->whereBetween('created_at', [
                    now()->startOfMonth(),
                    now()->endOfMonth(),
                ]);
            })
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.orders-history', [
            'orders' => $this->getOrders()
        ]);
    }
}
