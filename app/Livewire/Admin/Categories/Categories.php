<?php

namespace App\Livewire\Admin\Categories;

use App\Livewire\AdminComponent;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Categories | Byte Zone')]
class Categories extends AdminComponent
{
    use WithPagination;

    public function deleteCategory($id){
        $this->authorize('delete', Category::class);
        $category = Category::findorfail($id);
        $category->products()->delete();
        Storage::disk('public')->delete('/categories_icons/' . $category->logo);
        $category->delete();
        $this->resetPage(pageName: 'categories-page');
        $this->dispatch('flashMessage', message: 'Category deleted successfully!');
    }

    public function getCategories(){
        return Category::orderBy('name')->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.categories.categories', [
            'categories' => $this->getCategories(),
        ]);
    }
}
