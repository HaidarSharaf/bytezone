<?php

namespace App\Livewire\Admin;


use App\Livewire\AdminComponent;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\Title;

#[Title('Admin Dashboard | Byte Zone')]
class AdminDashboard extends AdminComponent
{
    public $products_count = 0;
    public $categories_count = 0;
    public $brands_count = 0;

    public $users_count = 0;

    public $admins_count = 0;

    public $orders = [];

    public $total_sales = 0;


    public function mount(){
        $this->products_count = Product::count();
        $this->categories_count = Category::count();
        $this->brands_count = Brand::count();

        $this->users_count = User::where('is_admin', false)->count();
        $this->admins_count = User::where('is_admin', true)->count();

        $this->orders = Order::query()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $this->total_sales = Order::sum('total_price');
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
