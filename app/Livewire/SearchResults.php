<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class SearchResults extends Component
{
    #[Reactive]
    public $products = [];

    public function selectProduct($productSlug)
    {
        // Emit event to clear search and close results
        $this->dispatch('search:clear-text');

        // Navigate to product page
        return $this->redirect("/product/{$productSlug}");
    }

    public function render()
    {
        return view('livewire.search-results');
    }
}
