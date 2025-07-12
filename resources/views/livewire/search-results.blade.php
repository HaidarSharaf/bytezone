<div>
    <div class="p-4 md:w-2xl sm:w-xl w-80 absolute top-1 left-1/2 -translate-x-1/2 border border-[#FF4D30] rounded-xl bg-white shadow-lg max-h-96 overflow-y-auto">

        @if(count($products) === 0)
            <p class="text-center text-[#0D1B2A] font-semibold md:text-lg sm:text-base text-sm py-4">
                No products found
            </p>
        @else
            <div class="mb-2">
                <p class="text-xs text-gray-500 text-center">
                    {{ count($products) }} {{ Str::plural('result', count($products)) }} found
                </p>
            </div>
        @endif

        @foreach($products as $product)
            <div
                class="py-3 px-2 flex border-b border-gray-200 hover:bg-gray-50 transition-colors cursor-pointer last:border-b-0"
                wire:key="{{ $product->id }}"
                wire:click="selectProduct('{{ $product->slug }}')"
            >
                <div class="w-full flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        @if(count($product->images) > 0)
                            <img
                                src="{{ asset('storage/products_images/' . $product->id . '/' . $product->images[0]) }}"
                                alt="{{ $product->name }}"
                                class="md:w-14 md:h-14 sm:h-10 sm:w-10 h-8 w-8 object-cover rounded"
                            >
                        @else
                            <div class="md:w-14 md:h-14 sm:h-10 sm:w-10 h-8 w-8 bg-gray-200 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif

                        <div class="flex flex-col">
                            <span class="text-[#FF4D30] sm:text-base text-sm font-semibold hover:underline">
                                {{ Str::limit($product->name, 25) }}
                            </span>
                            @if($product->category)
                                <span class="text-xs text-gray-500">
                                    {{ $product->category->name }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="text-right">
                        <p class="text-[#0D1B2A] font-semibold md:text-lg sm:text-base text-sm">
                            ${{ number_format($product->price, 2) }}
                        </p>
                        @if($product->discount_price)
                            <p class="text-xs text-gray-500 line-through">
                                ${{ number_format($product->original_price, 2) }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
