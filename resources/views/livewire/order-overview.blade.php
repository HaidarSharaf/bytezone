<div class="flex-1 flex" >
    <main class="flex-1 overflow-auto">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-[#FF4D30] sm:text-2xl">Order Details(#{{ $order->id }})</h2>

            <div class="mt-8 flex items-center justify-evenly">
                <div>
                    <span class="text-[#0D1B2A] font-semibold">
                        Payment Method:
                        <span class="py-2 px-3 bg-green-600 text-white rounded-lg">
                            {{ $order->payment_method }}
                        </span>
                    </span>
                </div>
                <div>
                    <span class="text-[#0D1B2A] font-semibold">
                        Payment Status:
                        <span
                            @class([
                                'bg-red-600' => $order->payment_status === 'Pending',
                                'bg-green-600' => $order->payment_status === 'Paid',
                                'py-2 px-3 text-white rounded-lg'
                            ])
                        >
                            {{ $order->payment_status }}
                        </span>
                    </span>
                </div>
                <div>
                    <span class="text-[#0D1B2A] font-semibold">
                        Delivery Status:
                        <span
                            @class([
                                'bg-red-600' => $order->status === 'Pending',
                                'bg-amber-600' => $order->status === 'Delivering',
                                'bg-green-600' => $order->status === 'Delivered',
                                'py-2 px-3 text-white rounded-lg'
                            ])
                        >
                            {{ $order->status }}
                        </span>
                    </span>
                </div>
            </div>

            <div
                class="relative w-full overflow-x-auto mt-6 sm:mt-8"
            >
                    @foreach($products as $product)
                            <div class="flex justify-between items-center gap-4 border-b border-[#0D1B2A] py-2">
                                <div class="flex items-center gap-4">
                                    <img class="sm:w-20 w-16 sm:h-20 h-16" src="{{ asset('storage/products_images/' . $product->id . '/'. $this->getImage($product->id)) }}"/>
                                    <p class="text-[#0D1B2A] font-semibold">{{ Str::limit($product->name, 20) }}</p>
                                </div>

                                <p class="p-4 text-base font-semibold text-[#0D1B2A]">x{{ $product->quantity }}</p>

                                <p class="p-4 text-base font-bold text-green-600">${{ number_format($product->price * $product->quantity, 2) }}</p>
                            </div>
                    @endforeach
            </div>

            <div class="mt-4">
                <dl class="flex items-center justify-between gap-4 pt-2">
                    <dt class="text-lg font-bold text-[#0D1B2A]">Total</dt>
                    <dd class="text-lg font-bold text-green-600">${{ number_format($order->total_price, 2) }}</dd>
                </dl>
            </div>
        </div>
    </main>
</div>
