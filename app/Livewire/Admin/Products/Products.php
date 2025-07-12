<?php

namespace App\Livewire\Admin\Products;

use App\Livewire\AdminComponent;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;


#[Title('Products | Byte Zone')]
class Products extends AdminComponent
{
    use WithPagination;

    public $categories = [];
    public $brands = [];

    #[Url(as: 'q', except: '')]
    public $text = '';
    #[Url(as: 'c', except: '')]
    public $category = '';
    #[Url(as: 'b', except: '')]
    public $brand = '';

    #[Session, Url(as: 'o', except: false)]
    public bool $showOutOfStock = false;


    public function mount(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
    }

    public function getFilteredProducts(){
        return Product::query()
            ->orderBy('name')
            ->when($this->text, function($query){
                $query->where('name', 'like', '%' . $this->text . '%');
            })
            ->when($this->category, function($query){
                $query->where('category_id', $this->category);
            })
            ->when($this->brand, function($query){
                $query->where('brand_id', $this->brand);
            })
            ->when($this->showOutOfStock, function($query){
                $query->where('stock', '<=', 0);
            })
            ->paginate(10);
    }

    public function deleteProduct($id){
        $this->authorize('delete', Product::class);
        $product = Product::findorfail($id);
        foreach($product->images as $image){
            Storage::disk('public')->delete('/products_images/'. $product->id . '/' . $image);
        }
        $product->delete();
        $this->dispatch('flashMessage', message: 'Product deleted successfully!');
    }

    public function toggleOutOfStock()
    {
        $this->showOutOfStock = !$this->showOutOfStock;
        $this->resetPage(pageName: 'products-page');
    }

    public function resetFilters(){
        $this->text = '';
        $this->category = '';
        $this->brand = '';
        $this->showOutOfStock = false;
        $this->resetPage(pageName: 'products-page');
    }

    public function getDiscountedPrice($price, $discount){
        return number_format($price - ($price * $discount / 100), 2);
    }


    public function render()
    {
        return view('livewire.admin.products.products', [
            'products' => $this->getFilteredProducts(),
        ]);
    }
}
