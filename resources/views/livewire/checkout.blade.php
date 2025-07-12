<section class="bg-white py-8 px-5 antialiased md:py-10 w-full rounded-lg">
    <form action="#" class="mx-auto w-full px-4 2xl:px-0">
        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
            <div class="min-w-0 flex-1 space-y-8">
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold text-[#0D1B2A] mb-4 ">Delivery Details</h2>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <label class="block text-sm font-semibold text-[#0D1B2A] "> City: </label>
                            </div>
                            <select wire:model="city" class="block w-full rounded-lg border cursor-pointer border-[#0D1B2A] bg-gray-50 p-2.5 text-sm text-[#0D1B2A] focus:border-[#0D1B2A] focus:ring-2 focus:outline-none">
                                <option selected>City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-[#0D1B2A] "> Street: </label>
                            <input wire:model="street" type="text" class="block w-full rounded-lg border border-[#0D1B2A] bg-gray-50 p-2.5 text-sm text-[#0D1B2A] focus:border-[#0D1B2A] focus:ring-2 focus:outline-none"/>
                            @error('street')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="space-y-4 w-full">
                    <h3 class="text-xl font-semibold text-[#0D1B2A]">Payment</h3>

                    <div>
                        <ul class="flex justify-evenly items-center">
                            <li>
                                <input wire:model="payment_method" type="radio" value="Cash on Delivery" class="hidden peer" id="cash_on_delivery" checked/>
                                <label for="cash_on_delivery" class="inline-flex items-center justify-between w-52 p-5 text-[#FF4D30] bg-white border border-[#FF4D30] rounded-lg cursor-pointer peer-checked:border-[#FF4D30] peer-checked:border-3 peer-checked:text-[#FF4D30] hover:text-[#F53003] hover:bg-gray-100">
                                    <div class="w-full text-lg font-semibold text-center">Cash On Delivery</div>
                                </label>
                            </li>
                            <li>
                                <input wire:model="payment_method" type="radio" value="Credit Card" id="credit_card" class="hidden peer">
                                <label for="credit_card" class="inline-flex items-center justify-between w-52 p-5 text-[#FF4D30] bg-white border border-[#FF4D30] rounded-lg cursor-pointer peer-checked:border-[#FF4D30] peer-checked:border-3 peer-checked:text-[#FF4D30] hover:text-[#F53003] hover:bg-gray-100">
                                    <div class="w-full text-lg font-semibold text-center">Credit Card</div>
                                </label>
                            </li>
                        </ul>
                        @error('payment_method')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mx-auto max-w-5xl" wire:show="payment_method === 'Credit Card'">
                    <h3 class="text-xl font-semibold text-[#0D1B2A]">Credit Card Details</h3>
                    <div class="mt-4 lg:flex lg:items-start lg:gap-12">
                        <form action="#" class="w-full rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6 lg:max-w-xl lg:p-8">
                            <div class="mb-6 grid grid-cols-2 gap-4">
                                <div class="col-span-2 sm:col-span-1">
                                    <label class="mb-2 block text-sm font-semibold text-[#0D1B2A] "> Full name (as displayed on card): </label>
                                    <input wire:model="full_name" type="text" class="block w-full rounded-lg border border-[#0D1B2A] bg-gray-50 p-2.5 text-sm text-[#0D1B2A] focus:border-[#0D1B2A] focus:ring-2 focus:outline-none"/>
                                    @error('full_name')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label class="mb-2 block text-sm font-semibold text-[#0D1B2A] "> Card number: </label>
                                    <input wire:model="card_number" type="text" class="block w-full rounded-lg border border-[#0D1B2A] bg-gray-50 p-2.5 text-sm text-[#0D1B2A] focus:border-[#0D1B2A] focus:ring-2 focus:outline-none" placeholder="xxxx-xxxx-xxxx-xxxx" pattern="^4[0-9]{12}(?:[0-9]{3})?$"/>
                                    @error('card_number')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-[#0D1B2A]">Expiry date:</label>
                                    <input wire:model="expiry_date" type="text" inputmode="numeric" class="block w-full rounded-lg border border-[#0D1B2A] bg-gray-50 p-2.5 text-sm text-[#0D1B2A] focus:border-[#0D1B2A] focus:ring-2 focus:outline-none" placeholder="MM/YY"/>
                                    @error('expiry_date')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="mb-2 flex items-center gap-1 text-sm font-semibold text-[#0D1B2A]">CVC/CVV:</label>
                                    <input wire:model="cvv" type="text" class="block w-full rounded-lg border border-[#0D1B2A] bg-gray-50 p-2.5 text-sm text-[#0D1B2A] focus:border-[#0D1B2A] focus:ring-2 focus:outline-none"/>
                                    @error('cvv')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                <div class="flow-root">
                    <div class="-my-3 divide-y divide-gray-200 ">
                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-semibold text-[#0D1B2A] ">Subtotal</dt>
                            <dd class="text-base font-medium text-[#0D1B2A] ">${{ $this->getCartTotal() }}</dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-semibold text-[#0D1B2A]">Delivery (Free)</dt>
                            <dd class="text-base font-medium text-green-500">$0.00</dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-bold text-[#0D1B2A]">Total</dt>
                            <dd class="text-base font-bold text-[#0D1B2A] ">${{ $this->getCartTotal() }}</dd>
                        </dl>
                    </div>

                    <div class="mt-6">
                        <button
                            wire:click="buy_now"
                            type="button"
                            class="w-full rounded-lg bg-[#FF4D30] px-4 py-2.5 text-base font-medium text-white hover:bg-[#F53003] focus:outline-none focus:ring-2 focus:ring-[#F53003] focus:ring-offset-2 disabled:opacity-50"
                            wire:loading.attr="disabled"
                        >
                            <span wire:loading.remove>Buy Now</span>
                            <span wire:loading>Processing...</span>
                        </button>
                </div>

            </div>
        </div>
    </form>
</section>
