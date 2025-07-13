<div
    x-data="{
        active: @entangle('active'),
        perSlide: @entangle('perSlide').defer,
        interval: null,
        total: @entangle('chunkCount'),
        setSlideCount() {
            let width = window.innerWidth;
            let size = 3;
            if (width < 770) {
                size = 1;
            } else if (width < 1024) {
                size = 2;
            }
            $wire.call('setPerSlide', size);
        },
        goTo(index) {
            this.active = index;
        },
        next() {
            this.active = (this.active + 1) % this.total;
        },
        start() {
            this.interval = setInterval(() => this.next(), 4000);
        },
        stop() {
            clearInterval(this.interval);
        }
    }"
    x-init="
        setSlideCount();
        start();
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => setSlideCount(), 100);
        });
    "
    class="overflow-hidden 2xl:max-w-7xl lg:max-w-5xl md:max-w-3xl sm:max-w-xl max-w-xs bg-white md:mx-auto flex flex-col items-center"
>
    <div
        x-ref="slides"
        class="flex transition-transform duration-700 ease-in-out w-full"
        :style="'transform: translateX(-' + (active * 100) + '%)'"
    >
        @foreach($chunkedProducts as $chunk)
            <div
                class="w-full flex-shrink-0 flex justify-evenly lg:space-x-3 md:space-x-2 lg:px-6 md:px-2 py-4">
                @foreach ($chunk as $product)
                    <div
                        class="rounded-md border-2 border-[#0D1B2A] bg-gray-200 hover:bg-gray-300 lg:max-w-[400px] max-w-xs transition duration-300 hover:scale-105 pb-4"
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
        @endforeach
    </div>

    <div class="mt-4 mb-4 flex space-x-2">
        <template x-for="i in total" :key="i">
            <button
                @click="goTo(i - 1)"
                :class="{
                    'bg-gray-800': active === (i - 1),
                    'bg-gray-400': active !== (i - 1)
                }"
                class="w-3 h-3 rounded-full transition-colors duration-300 cursor-pointer"
            ></button>
        </template>
    </div>
</div>
