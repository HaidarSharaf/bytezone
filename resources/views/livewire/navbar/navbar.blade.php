<div x-data="{ open: false }">
    <nav class="w-full p-6 flex justify-between items-center bg-white rounded-lg">
        <a
            href="{{ route('home') }}"
            wire:navigate
            class="flex items-center sm:space-x-5 space-x-2 text-2xl font-extrabold text-[#FF4D30]">
            <img src="/AppLogo/Logo.png" class="sm:max-w-14 max-w-8">
            <span>BYTE ZONE</span>
        </a>

        <div class="hidden justify-center lg:flex space-x-12">
            <a
                href="{{ route('home') }}"
               wire:navigate
                wire:current.exact="text-[#FF4D30]"
               class="nav-link xl:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
            >
                Home
            </a>

            <a
                href="{{ route('shop-by-category') }}"
               wire:navigate
                wire:current.exact="text-[#FF4D30]"
               class="nav-link xl:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
            >
                Shop by Category
            </a>

            <a
                href="{{ route('shop-by-brand') }}"
               wire:navigate
                wire:current.exact="text-[#FF4D30]"
               class="nav-link xl:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
            >
                Shop by Brand
            </a>

            @auth
            <a href="{{ route('orders-history') }}"
               wire:navigate
               wire:current.exact="text-[#FF4D30]"
               class="nav-link xl:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
            >
                Orders History
            </a>
            @endauth

        </div>
        <div class="hidden lg:flex items-center space-x-10">
            @guest
                <a
                    href="{{ route('login') }}"
                    wire:navigate
                    class="bg-[#FF4D30] xl:text-lg text-white font-bold px-4 py-2 rounded-lg hover:bg-[#F53003] transition-colors duration-300"
                >
                    Login
                </a>
            @endguest

            @auth
                <livewire:navbar.components.profile-dropdown/>
            @endauth

            <livewire:navbar.components.cart-count/>
        </div>

        <button
            class="lg:hidden focus:outline-none transition-colors duration-300 cursor-pointer"
            x-on:click="open = !open"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#0D1B2A] hover:text-[#FF4D30]" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

    </nav>

    <div
        class="flex flex-col items-center bg-white rounded-lg shadow-md mt-2 p-4 space-y-4 lg:hidden"
        x-show="open"
        x-transition.duration.500ms
    >
        <a
            href="{{ route('home') }}"
           wire:navigate
            wire:current.exact="text-[#FF4D30]"
           class="nav-link md:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
        >
            Home
        </a>

        <a
            href="{{ route('shop-by-category') }}"
            wire:navigate
            wire:current.exact="text-[#FF4D30]"
            class="nav-link md:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
        >
            Shop by Category
        </a>

        <a
            href="{{ route('shop-by-brand') }}"
            wire:navigate
            wire:current.exact="text-[#FF4D30]"
            class="nav-link md:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
        >
            Shop by Brand
        </a>

        @auth
        <a
            href="{{ route('orders-history') }}"
            wire:navigate
            wire:current.exact="text-[#FF4D30]"
            class="nav-link md:text-lg text-md font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300"
        >
            Orders History
        </a>
        @endauth

        <div class="flex items-center space-x-10 mt-2 pt-4 border-t border-t-[#0D1B2A]">
            @guest
                <a
                    href="{{ route('login') }}"
                    wire:navigate
                    class="bg-[#FF4D30] md:text-lg text-white font-bold px-4 py-2 rounded-lg hover:bg-[#F53003] transition-colors duration-300"
                >
                    Login
                </a>
            @endguest

            @auth
                <livewire:auth.logout/>
            @endauth

            <livewire:navbar.components.cart-count/>
        </div>

    </div>
</div>
