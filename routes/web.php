<?php

use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Brands\Brands;
use App\Livewire\Admin\Brands\CreateBrand;
use App\Livewire\Admin\Brands\EditBrand;
use App\Livewire\Admin\Categories\Categories;
use App\Livewire\Admin\Categories\CreateCategory;
use App\Livewire\Admin\Categories\EditCategory;
use App\Livewire\Admin\Orders;
use App\Livewire\Admin\Products\CreateProduct;
use App\Livewire\Admin\Products\EditProduct;
use App\Livewire\Admin\Products\Products as AdminProducts;
use App\Livewire\Admin\SendEmails;
use App\Livewire\Admin\Users\Admins;
use App\Livewire\Admin\Users\CreateAdmin;
use App\Livewire\Admin\Users\Users;
use App\Livewire\AllProducts;
use App\Livewire\Auth\AdminSecretKey;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\BrandProducts;
use App\Livewire\Cart;
use App\Livewire\CategoryProducts;
use App\Livewire\Checkout;
use App\Livewire\HomePage;
use App\Livewire\OrderOverview;
use App\Livewire\OrdersHistory;
use App\Livewire\ProductOverview;
use App\Livewire\ShopByBrand;
use App\Livewire\ShopByCategory;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('verify-email', VerifyEmail::class)->name('verify-email');
    Route::get('/orders-history', OrdersHistory::class)->name('orders-history');
});


Route::get('/', HomePage::class)->name('home');
Route::get('/shop-by-category', ShopByCategory::class)->name('shop-by-category');
Route::get('/shop-by-category/{category}', CategoryProducts::class)->name('category.products');

Route::get('/shop-by-brand', ShopByBrand::class)->name('shop-by-brand');
Route::get('/shop-by-brand/{brand}', BrandProducts::class)->name('brand.products');

Route::get('/products', AllProducts::class)->name('products');
Route::get('/product/{product}', ProductOverview::class)->name('product');

Route::get('/cart', Cart::class)->name('cart');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/order/{order}', OrderOverview::class)->name('order')->can('view', 'order');
    Route::get('/checkout', Checkout::class)->name('checkout');
});

Route::middleware(['auth', 'can:access-admin-panel'])->prefix('/admin')->group(function(){
    Route::get('/', AdminDashboard::class)->name('admin.dashboard');
    Route::get('/admin/secret-key', AdminSecretKey::class)->name('admin.secret-key');

    Route::get('/products', AdminProducts::class)->name('admin.all-products');
    Route::get('/create-product', CreateProduct::class)->name('admin.create-product');
    Route::get('/edit-product/{product}', EditProduct::class)->name('admin.edit-product');

    Route::get('/brands', Brands::class)->name('admin.brands');
    Route::get('/brands/create', CreateBrand::class)->name('admin.create-brand');
    Route::get('/brands/edit/{brand}', EditBrand::class)->name('admin.edit-brand');

    Route::get('/categories', Categories::class)->name('admin.categories');
    Route::get('/categories/create', CreateCategory::class)->name('admin.create-category');
    Route::get('/categories/edit/{category}', EditCategory::class)->name('admin.edit-category');

    Route::get('/users', Users::class )->name('admin.users');
    Route::get('/admins', Admins::class )->name('admin.admins');
    Route::get('/admins/create', CreateAdmin::class )->name('admin.create-admin');

    Route::get('/orders', Orders::class )->name('admin.orders');
    Route::get('/send-emails', SendEmails::class )->name('admin.send-emails');
});


