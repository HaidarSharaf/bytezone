<div>
<div class="flex mb-7">
        <ol
            class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse"
        >
            <li class="inline-flex items-center">
                <a
                    href="{{ route('home') }}"
                    wire:navigate
                    class="inline-flex items-center sm:text-md text-sm font-semibold text-[#0D1B2A] hover:text-[#FF4D30]"
                >
                    <svg class="me-2.5 h-3 w-3 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-[#0D1B2A] rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                    <a
                        href="{{ route('shop-by-category') }}"
                        wire:navigate
                        class="ms-1 sm:text-md text-sm font-semibold text-[#0D1B2A] hover:text-[#FF4D30]"
                    >
                        Shop by Category
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-[#0D1B2A] rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                    </svg>
                    <span
                        class="ms-1 sm:text-md text-sm font-semibold text-[#FF4D30]  md:ms-2"
                    >
                        {{ $category->name }}
                    </span>
                </div>
            </li>
        </ol>
    </div>

<section class="bg-white text-[#FF4D30] sm:text-2xl text-lg px-6 py-10 rounded-lg">
    <div
        class="lg:max-w-6xl lg:min-w-5xl md:max-w-xl sm:max-w-lg max-w-md mx-auto min-h-56 flex flex-col items-center"
         wire:init="getProducts()"
    >
        <h2 class="font-semibold mb-10 pl-5"
        >
            Showing {{ $category->name }} products:
        </h2>

        <div
            class="mt-10"
            wire:loading
        >
            <livewire:loader />
        </div>

        <div
            wire:loading.remove
            class="flex justify-evenly items-start flex-wrap gap-4"
        >
            @if(count($products) > 0)
                <livewire:products :products="$products" />
            @else
                <p class="text-[#0D1B2A] font-bold">No products found.</p>
            @endif
        </div>
    </div>
</section>


</div>

