<div class="bg-white max-w-7xl max-lg:max-w-2xl mx-auto p-8">

    <h1 class="text-3xl font-semibold text-[#0D1B2A] text-center">Shopping Cart</h1>

    <div class="grid lg:grid-cols-3 lg:gap-x-8 gap-x-6 gap-y-8 mt-6">

        <div class="lg:col-span-2 space-y-6">
            @if(count($products) > 0)
                @foreach($products as $product)
            <div class="flex gap-4 bg-white px-4 py-6 rounded-md shadow-sm border border-gray-400">
                <div class="flex gap-6 sm:gap-4 max-sm:flex-col">

                    <div class="w-32 h-32 max-sm:w-24 max-sm:h-24 shrink-0">
                        <img src="{{ asset('storage/products_images/' . $product->id . '/' . $product->images[0]) }}" class="w-full h-full object-contain" />
                    </div>

                    <div class="flex flex-col gap-4">

                        <div>
                            <h3 class="text-sm sm:text-base md:text-lg font-semibold text-[#0D1B2A]">{{ $product->name }}</h3>
                        </div>

                        <div class="mt-auto flex gap-2">
                            @if($product->discount !== 0)
                                <p class="lg:text-lg text-base font-extrabold text-[#0D1B2A] line-through">${{ $product->price }}</p>
                                <p class="lg:text-lg text-base font-extrabold text-green-600">${{ $this->getDiscountedPrice($product->price, $product->discount) }}</p>
                            @else
                                <p class="lg:text-lg text-base font-extrabold text-green-600">${{ $product->price }}</p>
                            @endif
                        </div>

                    </div>

                </div>

                <div class="ml-auto flex flex-col">

                    <div class="flex items-start gap-4 justify-end">
                        <button
                            wire:click="removeProduct({{ $product->id }})"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer fill-[#0D1B2A] hover:fill-red-600 inline-block" viewBox="0 0 24 24">
                                <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z" data-original="#000000"></path>
                                <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z" data-original="#000000"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center gap-3 mt-auto">

                        <button
                            type="button"
                            wire:click="decrement({{ $product->id }})"
                            @disabled($product->cart_quantity <= 1)
                            @class([
                                'flex items-center justify-center w-[18px] h-[18px] outline-none rounded-full',
                                'bg-[#0D1B2A] cursor-pointer' => $product->cart_quantity > 1,
                                'bg-gray-300 cursor-not-allowed' => $product->cart_quantity <= 1
                            ])
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-2 fill-white" viewBox="0 0 124 124">
                                <path d="M112 50H12C5.4 50 0 55.4 0 62s5.4 12 12 12h100c6.6 0 12-5.4 12-12s-5.4-12-12-12z" data-original="#000000"></path>
                            </svg>
                        </button>

                        <span class="font-semibold text-base leading-[18px]">{{ $product->cart_quantity }}</span>

                        <button
                            type="button"
                            wire:click="increment({{ $product->id }})"
                            class="flex items-center justify-center w-[18px] h-[18px] cursor-pointer bg-[#0D1B2A] outline-none rounded-full"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-2 fill-white" viewBox="0 0 42 42">
                                <path d="M37.059 16H26V4.941C26 2.224 23.718 0 21 0s-5 2.224-5 4.941V16H4.941C2.224 16 0 18.282 0 21s2.224 5 4.941 5H16v11.059C16 39.776 18.282 42 21 42s5-2.224 5-4.941V26h11.059C39.776 26 42 23.718 42 21s-2.224-5-4.941-5z" data-original="#000000"></path>
                            </svg>
                        </button>

                    </div>
                </div>
            </div>
        @endforeach
            @else
                <h1 class="lg:text-3xl md:text-2xl sm:text-xl text-center font-bold p-2 text-[#FF4D30] rounded-lg lg:mt-10">Cart is empty!</h1>
            @endif
        </div>


        <div class="bg-white rounded-md px-4 py-6 h-max shadow-sm border border-gray-400">

            <ul class="text-slate-500 font-medium space-y-4">
                <li class="flex flex-wrap gap-4 text-sm">Subtotal <span class="ml-auto font-semibold text-[#0D1B2A]">${{ $this->getCartTotal() }}</span></li>
                <li class="flex flex-wrap gap-4 text-sm">Delivery <span class="text-green-600">(Free)</span> <span class="ml-auto font-semibold text-[#0D1B2A]">$0.00</span></li>
                <hr class="border-slate-300" />
                <li class="flex flex-wrap gap-4 text-sm font-semibold text-[#0D1B2A]">Total <span class="ml-auto">${{ $this->getCartTotal() }}</span></li>
            </ul>

            <div class="mt-8 space-y-4">
                <button
                    wire:click="checkout"
                    @disabled(count($products) === 0)
                    type="button"
                    class="text-sm px-4 py-2.5 w-full font-medium tracking-wide bg-[#0D1B2A] hover:bg-slate-800 text-white rounded-md cursor-pointer disabled:cursor-not-allowed disabled:bg-slate-400"
                >
                    Checkout
                </button>
            </div>

            <div class="mt-5 flex flex-wrap justify-center gap-4">
                <img src='https://readymadeui.com/images/master.webp' class="w-10 object-contain" />
                <img src='https://readymadeui.com/images/visa.webp' class="w-10 object-contain" />
                <img src='https://readymadeui.com/images/american-express.webp' class="w-10 object-contain" />
            </div>

        </div>
    </div>
</div>
