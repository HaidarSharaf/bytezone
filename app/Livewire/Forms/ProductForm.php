<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{

    public ?Product $product;

    #[Locked]
    public $id;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|numeric|min:0')]
    public $stock;

    #[Validate('required|numeric|min:0')]
    public $discount;

    #[Validate('required|string|max:255')]
    public $description = '';

    #[Validate('required|exists:categories,id')]
    public $category_id;

    #[Validate('required|exists:brands,id')]
    public $brand_id;

    #[Validate('nullable|array')]
    public array $images = [];

    public $images_path = [];

    public array $images_to_remove = [];

    public function setProduct(Product $product)
    {
        $this->id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->stock = $product->stock;
        $this->discount = $product->discount;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->images_path = $product->images;

        $this->product = $product;
    }

    public function store(){
        $this->validate();

        if (empty($this->images)) {
            $this->addError('images', 'Please upload at least one image.');
            return;
        }

        foreach ($this->images as $image) {
            validator(['image' => $image], [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ])->validate();
        }

        $product = Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'price' => $this->price,
            'stock' => $this->stock,
            'discount' => $this->discount,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'images' => json_encode([]),
        ]);

        $paths = [];
        foreach($this->images as $image){
            $path = $image->storePublicly("products_images/{$product->id}", ['disk' => 'public']);
            $paths[] = basename($path);
        }

        $product->update([
            'images' => $paths
        ]);

    }

    public function update(){
        $this->validate();

        $slug = Str::slug($this->name);

        $paths = $this->images_path;

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $path = $image->storePublicly("products_images/{$this->id}", ['disk' => 'public']);
                $paths[] = basename($path);

            }
        }

        foreach ($this->images_to_remove as $image) {
            $path = "products_images/{$this->id}/{$image}";
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            $paths = array_filter($paths, fn($img) => $img !== $image);
        }

        $paths = array_values($paths);

        $this->product->update([
            'name' => $this->name,
            'slug' => $slug,
            'price' => $this->price,
            'stock' => $this->stock,
            'discount' => $this->discount,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'images' => $paths,
        ]);

    }
}
