<section
    x-data
    class="bg-white lg:px-6 px-4 py-8 rounded-lg lg:max-w-5xl md:max-w-3xl sm:max-w-lg max-w-md mx-auto"
>

    <div class="mb-4 flex justify-evenly items-center flex-wrap gap-8">
        @foreach ($products as $product)
        <div
            class="rounded-md border-2 border-[#0D1B2A] bg-gray-200 hover:bg-gray-300 lg:max-w-[400px] max-w-xs transition duration-300 hover:scale-105"
            wire:key="{{ $product->id }}"
        >
            <div class="lg:h-[300px] h-[200px] w-full">
                <a
                    href="{{ route('product', $product->slug) }}"
                    wire:navigate
                   class="flex justify-center items-center h-full"
                >
                    <img class="w-80 h-full border-b border-b-[#0D1B2A]" src="{{ asset('storage/products_images/' . $product->id . '/' . $product->images[0]) }}"/>
                </a>
            </div>

            <div class="p-6 max-h-64">
                <div class="mb-4">
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

                <a
                    href="{{ route('product', $product->slug) }}"
                    wire:navigate
                   class="lg:text-xl md:text-lg text-base font-semibold leading-tight hover:underline text-[#0D1B2A]">{{ Str::limit($product->name, 20) }}</a>

                <div class="mt-2 flex items-center gap-2">
                    @if($product->stock > 0)
                        <p class="md:text-sm text-xs font-medium text-green-600">In Stock</p>
                    @else
                        <p class="md:text-sm text-xs font-medium text-red-600">Out of Stock</p>
                    @endif
                </div>

                <div class="mt-2 mb-4 flex justify-items-start gap-4">
                    @if($product->stock === 0)
                        <p class="lg:text-2xl md:text-lg text-base font-extrabold text-red-600 line-through">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    @elseif($product->discount !== 0)
                        <p class="lg:text-2xl md:text-lg text-base font-extrabold text-[#0D1B2A] line-through">
                            ${{ number_format($product->price, 2) }}
                        </p>
                        <p class="lg:text-2xl md:text-lg text-base font-extrabold text-green-600">
                           ${{ $this->getDiscountedPrice($product->price, $product->discount) }}
                        </p>
                    @else
                        <p class="lg:text-2xl md:text-lg font-extrabold text-green-600">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    @endif
                </div>

                <button
                    type="button"
                    wire:click="addProduct({{ $product->id }})"
                    wire:loading.attr="disabled"
                    @disabled($product->stock === 0 || !empty($inCart[$product->id]))
                    @class([
                        'inline-flex w-full items-center justify-center rounded-lg px-5 py-2.5 md:text-base text-sm font-medium text-white',
                        'bg-[#0D1B2A] cursor-not-allowed' => !empty($inCart[$product->id]),
                        'bg-red-300 cursor-not-allowed' => $product->stock === 0,
                        'bg-[#FF4D30] cursor-pointer hover:bg-[#F53003]' => $product->stock > 0 && empty($inCart[$product->id])
                    ])
                >
                    <div
                        class="flex justify-center items-center"
                         wire:loading.remove
                    >
                        @if(empty($inCart[$product->id]) && $product->stock > 0)
                            <svg class="-ms-2 me-2 lg:h-8 lg:w-8 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>
                        @endif
                        {{ $product->stock === 0 ? 'Out of Stock' : (!empty($inCart[$product->id]) ? 'Product In Cart' : 'Add to cart') }}
                    </div>

                    <div wire:loading>
                        <livewire:loader />
                    </div>

                </button>

            </div>
        </div>
        @endforeach
    </div>

</section>
