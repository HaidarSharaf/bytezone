<div class="relative w-full">
    @if($showResults)
        <div
            class="fixed inset-0 bg-gray-900/50 backdrop-blur-lg z-40"
            wire:click="hideResults"
        ></div>
    @endif

    <div class="relative z-50 w-full flex gap-3 rounded-full border-2 border-[#FF4D30] overflow-hidden lg:max-w-xl md:max-w-lg sm:max-w-md max-w-64 mx-auto placeholder:text-[#0D1B2A] bg-white focus-within:ring-1 focus-within:ring-[#F53003]">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192.904 192.904" width="18px" class="fill-[#0D1B2A] md:ml-4 ml-2">
            <path d="m190.707 180.101-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 0 0 5.303 2.197 7.498 7.498 0 0 0 5.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z"/>
        </svg>

        <input
            type="text"
            placeholder="Search a Product..."
            class="w-full outline-none bg-white text-[#0D1B2A] text-sm px-4 py-3"
            wire:model.live.debounce.300ms="searchText"
            wire:offline.attr="disabled"
            wire:focus="showResults"
        />

        @if(!empty($searchText))
            <button
                type="button"
                class="mr-3 p-1 hover:bg-gray-100 rounded-full cursor-pointer"
                wire:click="clear"
            >
                <svg class="w-4 h-4 text-[#0D1B2A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        @endif
    </div>

    @if($showResults)
        <div class="relative z-50 mt-3">
            <div
                class="w-full flex justify-center items-center"
                wire:loading
                wire:target="searchText"
            >
                <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-[#FF4D30]"></div>
            </div>

            <div
                wire:loading.remove
                wire:target="searchText"
            >
                @if(!empty($searchText) && count($products) > 0)
                    <div
                        class="p-4 md:w-2xl sm:w-xl w-80 absolute top-1 left-1/2 -translate-x-1/2 border border-[#FF4D30] rounded-xl bg-white shadow-lg max-h-96 overflow-y-auto"
                    >
                        @foreach($products as $product)
                            <div
                                class="py-3 px-2 flex border-b border-gray-200 hover:bg-gray-50 transition-colors cursor-pointer last:border-b-0"
                                wire:key="{{ $product->id }}"
                            >
                                <a
                                    wire:navigate
                                    class="w-full flex items-center justify-between"
                                    href="{{ route('product', $product->slug) }}"
                                    wire:click="hideResults"
                                >
                                    <div class="flex items-center gap-4">
                                        @if(is_array($product->images) && count($product->images) > 0)
                                            <img
                                                src="{{ asset('storage/products_images/' . $product->id . '/' . $product->images[0]) }}"
                                                alt="{{ $product->name }}"
                                                class="md:w-14 md:h-14 sm:h-10 sm:w-10 h-8 w-8 object-cover rounded"
                                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                            >
                                            <div class="md:w-14 md:h-14 sm:h-10 sm:w-10 h-8 w-8 bg-gray-200 rounded flex items-center justify-center" style="display: none;">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="md:w-14 md:h-14 sm:h-10 sm:w-10 h-8 w-8 bg-gray-200 rounded flex items-center justify-center">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif

                                        <span class="text-[#FF4D30] sm:text-base text-sm font-semibold hover:underline">
                                            {{ Str::limit($product->name, 25) }}
                                        </span>
                                    </div>

                                    @if($product->discount > 0)
                                        <p class="text-green-500 font-semibold md:text-lg sm:text-base text-sm">
                                            $ {{ $this->getDiscountedPrice($product->price, $product->discount) }}
                                        </p>
                                    @else
                                        <p class="text-[#0D1B2A] font-semibold md:text-lg sm:text-base text-sm">
                                            ${{ number_format($product->price, 2) }}
                                        </p>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>

                @elseif(!empty($searchText))
                    <div class="p-4 md:w-2xl sm:w-xl w-80 absolute top-1 left-1/2 -translate-x-1/2 border border-[#FF4D30] rounded-xl bg-white shadow-lg">
                        <p class="text-center text-[#0D1B2A] font-semibold md:text-lg sm:text-base text-sm py-4">
                            No products found
                        </p>
                    </div>
                @else
                    <div class="p-4 md:w-2xl sm:w-xl w-80 absolute top-1 left-1/2 -translate-x-1/2 border border-[#FF4D30] rounded-xl bg-white shadow-lg">
                        <p class="text-center text-[#0D1B2A] font-semibold md:text-lg sm:text-base text-sm py-4">
                            Start typing to search products...
                        </p>
                    </div>
                @endif

            </div>
        </div>
    @endif
</div>
