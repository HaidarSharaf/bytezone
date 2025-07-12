<?php

namespace App\Livewire\Admin;

use App\Livewire\AdminComponent;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

#[Title('All Orders | Byte Zone')]
class Orders extends AdminComponent
{
    use WithPagination;

    #[Url(as: 'p', except: '')]
    public $payment_status = '';
    #[Url(as: 's', except: '')]
    public $status = '';

    public function getOrders(){
        return Order::query()
            ->orderBy('created_at', 'desc')
            ->when($this->payment_status, function($query){
                $query->where('payment_status', $this->payment_status);
            })
            ->when($this->status, function($query){
                $query->where('status', $this->status);
            })
            ->paginate(10);
    }

    public function updatePaymentStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);
        $order->payment_status = $status;
        $order->save();
        $this->dispatch('flashMessage', message: 'Payment status updated successfully!');
    }

    public function updateOrderStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $status;
        $order->save();
        $this->dispatch('flashMessage', message: 'Order status updated successfully!');
    }

    public function resetFilters(){
        $this->payment_status = '';
        $this->status = '';
        $this->resetPage(pageName: 'orders-page');
    }

    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => $this->getOrders()
        ]);
    }
}
