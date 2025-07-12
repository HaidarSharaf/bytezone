<div>
    <a
        href="{{ route('cart') }}"
        wire:navigate
        wire:current.exact="text-[#FF4D30]"
    >
        <div class="relative">
            <div class="t-0 absolute left-4 bottom-4">
                <p class="flex md:max-h-2 md:max-w-2 h-1 w-1 items-center justify-center rounded-full bg-[#FF4D30] p-3 text-xs text-white">
                    {{ $cartCount }}
                </p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor"
                 class="md:max-h-12 md:max-w-12 h-8 w-8 text-[#0D1B2A] hover:text-[#FF4D30]">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
            </svg>
        </div>
    </a>
</div>
