<?php

namespace App\Livewire\Forms;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BrandForm extends Form
{
    public ?Brand $brand;

    #[Locked]
    public $id;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048')]
    public $logo;

    public $logo_path = '';

    public function setBrand(Brand $brand)
    {
        $this->id = $brand->id;
        $this->name = $brand->name;
        $this->logo_path = $brand->logo;

        $this->brand = $brand;
    }

    public function store(){
        $this->validate();

        if($this->logo){
            $this->logo_path = $this->logo->storePublicly("brands_icons", ['disk' => 'public']);
            $this->logo_path = basename($this->logo_path);
        } else{
            $this->addError('logo', 'Please upload a logo.');
            return;
        }

        Brand::create([
            'name' => $this->name,
            'logo' => $this->logo_path,
        ]);
    }

    public function update(){
        $this->validate();

        if ($this->logo) {
            Storage::disk('public')->delete('brands_icons/' . $this->logo_path);
            $this->logo_path = $this->logo->storePublicly("brands_icons", ['disk' => 'public']);
            $this->logo_path = basename($this->logo_path);
        }

        $this->brand->update([
            'name' => $this->name,
            'logo' => $this->logo_path,
        ]);
    }
}
