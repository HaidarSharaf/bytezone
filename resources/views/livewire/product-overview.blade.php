<section class="w-full py-8 bg-white md:py-16 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">

            <div
                x-data="{ active: 0 }"
                class="relative shrink-0 max-w-md lg:max-w-lg mx-auto p-2"
            >
                <div class="flex justify-between items-center">

                    @if(count($product->images) > 1)
                        <button
                            @click="active = (active - 1 + {{ count($product->images) }}) % {{ count($product->images) }}"
                            class="bg-white/50 p-2 rounded-full z-10 cursor-pointer"
                        >
                            <svg viewBox="0 0 1024 1024" class="icon w-8 h-8" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#0D1B2A"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M768 903.232l-50.432 56.768L256 512l461.568-448 50.432 56.768L364.928 512z" fill="#0D1B2A"></path></g></svg>
                        </button>
                    @endif

                    @foreach ($product->images as $index => $image)
                        <img
                            src="{{ asset('storage/products_images/' . $product->id . '/' . $image) }}"
                            class="w-full h-50 transition-all duration-500 absolute top-0 left-0"
                            :class="{ 'opacity-100 relative': active === {{ $index }}, 'opacity-0': active !== {{ $index }} }"
                        />
                    @endforeach

                    @if(count($product->images) > 1)
                        <button
                    @click="active = (active + 1) % {{ count($product->images) }}"
                    class="bg-white/50 p-2 rounded-full z-10 cursor-pointer"
                >
                    <svg viewBox="0 0 1024 1024" class="icon w-8 h-8" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#0D1B2A" stroke="#0D1B2A"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M256 120.768L306.432 64 768 512l-461.568 448L256 903.232 659.072 512z" fill="#0D1B2A"></path></g></svg>
                </button>
                    @endif

                </div>

                @if(count($product->images) > 1)
                    <div class="flex justify-center mt-8 space-x-2 relative z-10">
                    @foreach ($product->images as $index => $image)
                        <button
                            class="w-3 h-3 rounded-full cursor-pointer"
                            :class="active === {{ $index }} ? 'bg-gray-800' : 'bg-gray-400'"
                            @click="active = {{ $index }}"
                        ></button>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="mt-6 sm:mt-8 lg:mt-0">
                <h1
                    class="text-xl font-semibold text-[#0D1B2A] sm:text-2xl"
                >
                    {{$product->name}}
                </h1>

                <div class="mt-2 flex items-center gap-2">
                    @if($product->stock > 0)
                        <p class="md:text-base text-xs font-semibold text-green-600">In Stock</p>
                    @else
                        <p class="md:text-base text-xs font-semibold text-red-600">Out of Stock</p>
                    @endif
                </div>

                <div class="mt-4">
                    @if($product->discount !== 0)
                        <span
                            class="me-2 rounded px-2.5 py-0.5 text-xs font-medium text-green-600 border-1 border-green-600 bg-green-200"
                        >
                            Save {{ $product->discount }}%
                        </span>
                    @else
                        <span class="me-2"></span>
                    @endif
                </div>

                <div class="mt-4 items-center gap-4 flex">
                    @if($product->stock === 0)
                        <p class="text-2xl font-extrabold text-red-600 line-through sm:text-3xl">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    @elseif($product->discount !== 0)
                        <p class="text-2xl font-extrabold text-[#0D1B2A] line-through sm:text-3xl">
                            ${{ number_format($product->price, 2) }}
                        </p>

                        <p class="text-2xl font-extrabold text-green-600 sm:text-3xl">
                            ${{ $this->getDiscountedPrice($product->price, $product->discount) }}
                        </p>
                    @else
                        <p class="text-2xl font-extrabold text-green-600 sm:text-3xl">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    @endif
                </div>

                <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <button
                        type="button"
                        wire:click="addProduct()"
                        wire:loading.attr="disabled"
                        @disabled($product->stock === 0 || $inCart)
                        @class([
                            'inline-flex w-full items-center justify-center rounded-lg px-5 py-2.5 md:text-base text-sm font-medium text-white',
                            'bg-[#0D1B2A] cursor-not-allowed' => $inCart,
                            'bg-red-300 cursor-not-allowed' => $product->stock === 0,
                            'bg-[#FF4D30] cursor-pointer hover:bg-[#F53003]' => $product->stock > 0 && !$inCart
                        ])
                    >
                        <div
                            class="flex items-center justify-center"
                            wire:loading.remove
                        >
                            @if(!$inCart && $product->stock > 0)
                                <svg class="-ms-2 me-2 lg:h-8 lg:w-8 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                </svg>
                            @endif
                            {{ $product->stock === 0 ? 'Out of Stock' : ( $inCart ? 'Product In Cart' : 'Add to cart' ) }}
                        </div>

                        <div wire:loading>
                            <livewire:loader />
                        </div>

                    </button>
                </div>

                <hr class="my-6 md:my-8 border-[#FF4D30]" />

                <p class="mb-6 text-[#FF4D30] font-semibold text-center lg:text-lg">
                    {{$product->description}}
                </p>

            </div>
        </div>

        <div class="mt-16">
            <p class="md:text-xl text-lg font-bold text-[#0D1B2A] ml-4 mb-3 ">People also search for:</p>
            <livewire:products-slider :products="$relatedProducts" />
        </div>

    </div>
</section>
