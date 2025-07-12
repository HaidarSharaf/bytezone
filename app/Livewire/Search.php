<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{
    #[Url(as: 'q', except: '')]
    public $searchText = '';

    public $showResults = false;

    #[On('search:clear-text')]
    public function clear()
    {
        $this->searchText = '';
        $this->showResults = false;
    }

    public function updatedSearchText()
    {
        $this->showResults = !empty(trim($this->searchText));
    }

    public function hideResults()
    {
        $this->showResults = false;
    }

    public function getDiscountedPrice($price, $discount){
        return number_format($price - ($price * $discount / 100), 2);
    }

    public function getProducts()
    {
        if (empty(trim($this->searchText))) {
            return collect([]);
        }

        return Product::where('name', 'LIKE', "%{$this->searchText}%")
            ->limit(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.search', [
            'products' => $this->getProducts()
        ]);
    }
}
