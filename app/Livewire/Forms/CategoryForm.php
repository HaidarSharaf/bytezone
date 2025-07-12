<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?Category $category;

    #[Locked]
    public $id;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048')]
    public $logo;

    public $logo_path = '';

    public function setCategory(Category $category)
    {
        $this->id = $category->id;
        $this->name = $category->name;
        $this->logo_path = $category->logo;

        $this->category = $category;
    }

    public function store(){
        $this->validate();

        if($this->logo){
            $this->logo_path = $this->logo->storePublicly("categories_icons", ['disk' => 'public']);
            $this->logo_path = basename($this->logo_path);
        } else{
            $this->addError('logo', 'Please upload a logo.');
            return;
        }

        Category::create([
            'name' => $this->name,
            'logo' => $this->logo_path,
        ]);
    }

    public function update(){
        $this->validate();

        if ($this->logo) {
            Storage::disk('public')->delete('categories_icons/' . $this->logo_path);
            $this->logo_path = $this->logo->storePublicly("categories_icons", ['disk' => 'public']);
            $this->logo_path = basename($this->logo_path);
        }

        $this->category->update([
            'name' => $this->name,
            'logo' => $this->logo_path,
        ]);
    }
}
