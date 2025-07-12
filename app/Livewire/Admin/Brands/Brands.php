<?php

namespace App\Livewire\Admin\Brands;

use App\Livewire\AdminComponent;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Brands | Byte Zone')]
class Brands extends AdminComponent
{
    use WithPagination;

    public function deleteBrand($id){
        $this->authorize('delete', Brand::class);
        $brand = Brand::findorfail($id);
        $brand->products()->delete();
        Storage::disk('public')->delete('/brands_icons/' . $brand->logo);
        $brand->delete();
        $this->resetPage(pageName: 'brands-page');
        $this->dispatch('flashMessage', message: 'Brand deleted successfully!');
    }

    public function getBrands(){
        return Brand::orderBy('name')->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.brands.brands', [
            'brands' => $this->getBrands(),
        ]);
    }
}
