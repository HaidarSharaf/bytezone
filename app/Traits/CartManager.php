<?php

namespace App\Traits;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

trait CartManager
{
    protected function getCart()
    {
        if (Auth::check()) {
            return Cart::firstOrCreate(
                ['user_id' => Auth::id()],
                ['products' => json_encode([]), 'total_price' => 0]
            );
        }

        return Session::get('cart', [
            'products' => [],
            'total_price' => 0,
        ]);
    }

    /**
     * Decode and return all cart items.
     */
    public function getCartItems(): array
    {
        $cart = $this->getCart();

        return Auth::check()
            ? json_decode($cart->products, true)
            : $cart['products'];
    }

    /**
     * Save updated cart items and calculate total.
     */
    protected function saveCart(array $products)
    {
        $totalPrice = collect($products)->sum(fn($item) => $item['price'] * $item['quantity']);

        if (Auth::check()) {
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
            $cart->products = json_encode($products);
            $cart->total_price = $totalPrice;
            $cart->save();
        } else {
            Session::put('cart', [
                'products' => $products,
                'total_price' => $totalPrice,
            ]);
        }
    }

    public function mergeSessionCartWithUserCart()
    {
        $sessionCart = Session::get('cart', ['products' => []]);
        $sessionProducts = $sessionCart['products'];

        if (empty($sessionProducts)) {
            return;
        }

        $userProducts = $this->getCartItems();

        foreach ($sessionProducts as $sessionItem) {
            $exists = false;

            foreach ($userProducts as $userItem) {
                if ($userItem['id'] === $sessionItem['id']) {
                    $userItem['quantity'] += $sessionItem['quantity'];
                    $exists = true;
                    break;
                }
            }

            if (!$exists) {
                $userProducts[] = $sessionItem;
            }
        }

        $this->saveCart($userProducts);

        Session::forget('cart');
    }

    /**
     * Add a product to the cart or increase its quantity by 1.
     */
    public function addToCart($product)
    {
        $products = $this->getCartItems();
        $exists = false;

        foreach ($products as &$item) {
            if ($item['id'] === $product->id) {
                $item['quantity'] += 1;
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $products[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        $this->saveCart($products);
    }

    /**
     * Remove a product completely from the cart.
     */
    public function removeFromCart(int $productId)
    {
        $products = array_filter($this->getCartItems(), fn($item) => $item['id'] !== $productId);
        $this->saveCart(array_values($products));
    }

    /**
     * Set the quantity of a product in the cart (minimum 1).
     */
    public function updateQuantity(int $productId, int $quantity)
    {
        $products = $this->getCartItems();

        foreach ($products as &$item) {
            if ($item['id'] === $productId) {
                $item['quantity'] = max(1, $quantity);
                break;
            }
        }

        $this->saveCart($products);
    }

    /**
     * Increase product quantity by 1.
     */
    public function incrementProduct(int $productId)
    {
        $products = $this->getCartItems();

        foreach ($products as &$item) {
            if ($item['id'] === $productId) {
                $item['quantity'] += 1;
                break;
            }
        }

        $this->saveCart($products);
    }

    /**
     * Decrease product quantity by 1 (not below 1).
     */
    public function decrementProduct(int $productId)
    {
        $products = $this->getCartItems();

        foreach ($products as &$item) {
            if ($item['id'] === $productId && $item['quantity'] > 1) {
                $item['quantity'] -= 1;
                break;
            }
        }

        $this->saveCart($products);
    }

    /**
     * Check if a product is in the cart.
     */
    public function isInCart(int $productId): bool
    {
        return collect($this->getCartItems())->contains('id', $productId);
    }

    /**
     * Get number of distinct items in the cart.
     */
    public function getCartCount(): int
    {
        return count($this->getCartItems());
    }

    /**
     * Get total price from the cart.
     */
    public function getCartTotal()
    {
        $cart = $this->getCart();
        return Auth::check()
            ? number_format($cart->total_price, 2)
            : number_format($cart['total_price'], 2);
    }

    /**
     * Clear the entire cart.
     */
    public function clearCart()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            Session::forget('cart');
        }
    }

    /**
     * Build an associative array of in-cart status for a list of products.
     */
    public function buildInCartArray($products): array
    {
        $inCart = [];
        $cartItems = $this->getCartItems();

        foreach ($products as $product) {
            $inCart[$product->id] = collect($cartItems)->contains('id', $product->id);
        }

        return $inCart;
    }

    /**
     * Get all products in the cart as Product models (with cart quantity).
     */
    public function getCartProductModels()
    {
        $items = $this->getCartItems();
        $ids = collect($items)->pluck('id');
        $products = Product::whereIn('id', $ids)->get();

        foreach ($products as $product) {
            $item = collect($items)->firstWhere('id', $product->id);
            $product->cart_quantity = $item['quantity'] ?? 1;
        }

        return $products;
    }

    /**
     * Get the total number of items in the cart (sum of all quantities).
     */
    public function getCartItemCount(): int
    {
        return collect($this->getCartItems())->sum('quantity');
    }




}
