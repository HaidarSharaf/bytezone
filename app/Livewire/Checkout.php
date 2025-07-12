<?php

namespace App\Livewire;

use App\Models\Order;
use App\Traits\CartManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Checkout | Byte Zone')]
class Checkout extends Component
{
    use CartManager;
    public $cities = [];

    public $city = '';

    public $street = '';

    public $payment_method = 'Cash on Delivery';

    public $full_name = '';
    public $card_number = '';
    public $expiry_date = '';
    public $cvv = '';



    public function mount()
    {
        $this->cities = ['Beirut', 'Mount Lebanon', 'Sidon', 'Nabatieh', 'Tyre', 'Tripoli', 'Jounieh', 'Baalbek', 'Bekaa'];

        if (empty($this->getCartItems())) {
            $this->redirect(route('cart'), navigate: true);
        }
    }

    public function buy_now(){
        $this->validate([
            'city' => ['required', Rule::in($this->cities)],
            'street' => ['required','string','max:255'],
            'payment_method' => ['required', 'in:Cash on Delivery,Credit Card'],
        ]);

        if ($this->payment_method === 'Credit Card') {
            $this->validate([
                'full_name' => ['required', 'string', 'max:255'],
                'card_number' => ['required', 'string', 'regex:/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/'],
                'expiry_date' => ['required', 'string', 'regex:/^(0[1-9]|1[0-2])\/[0-9]{2}$/'],
                'cvv' => ['required', 'string', 'size:3', 'regex:/^[0-9]{3}$/'],
            ], [
                'card_number.regex' => 'Card number must be in format xxxx-xxxx-xxxx-xxxx',
                'expiry_date.regex' => 'Expiry date must be in format MM/YY',
                'cvv.regex' => 'CVV must be 3 digits',
            ]);
        }

        $cartItems = $this->getCartItems();

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'address' => [
                'city' => $this->city,
                'street' => $this->street,
            ],
            'products' => json_encode($cartItems),
            'total_price' => (float) str_replace(',', '', $this->getCartTotal()),
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_method === 'Credit Card' ? 'Paid' : 'Pending',
            'status' => 'Pending',
        ]);

        Auth::user()->notify(new \App\Notifications\Order(
            order: $order
        ));

        $this->clearCart();
        $this->redirect(route('orders-history'), navigate: true);
    }


    public function render()
    {
        return view('livewire.checkout');
    }
}
