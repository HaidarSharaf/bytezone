<div
    x-data="{ showSidebar: false }"
>

    <div
        x-cloak
        x-show="showSidebar"
        class="fixed inset-0 z-10 bg-surface-dark/10 backdrop-blur-xs"
        x-on:click="showSidebar = false"
        x-transition.opacity
    >

    </div>

    <nav
        x-cloak
        class="fixed left-0 z-80 flex h-svh w-60 shrink-0 flex-col bg-white p-4 transition-transform duration-300 md:w-72 lg:translate-x-0 lg:relative"
        x-bind:class="showSidebar ? 'translate-x-0' : '-translate-x-full'"
    >

        <a
            href="#"
            wire:navigate
            class="ml-2 mb-10 w-fit text-2xl font-bold text-on-surface-strong flex items-center gap-4 text-[#FF4D30]"
        >
            <img src="/AppLogo/Logo.png" class="sm:max-w-14 max-w-8">
            <span>BYTE ZONE</span>
        </a>

        <div class="flex flex-col gap-4 overflow-y-auto pb-6">

            <a
                href="{{ route('admin.dashboard') }}"
                wire:navigate
                wire:current.exact="text-[#FF4D30]"
                class="flex items-center rounded-radius gap-4 px-2 py-1.5 text-lg font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300 focus-visible:underline focus:outline-hidden"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 shrink-0" aria-hidden="true">
                    <path fill-rule="evenodd" d="M1 2.75A.75.75 0 0 1 1.75 2h16.5a.75.75 0 0 1 0 1.5H18v8.75A2.75 2.75 0 0 1 15.25 15h-1.072l.798 3.06a.75.75 0 0 1-1.452.38L13.41 18H6.59l-.114.44a.75.75 0 0 1-1.452-.38L5.823 15H4.75A2.75 2.75 0 0 1 2 12.25V3.5h-.25A.75.75 0 0 1 1 2.75ZM7.373 15l-.391 1.5h6.037l-.392-1.5H7.373Zm7.49-8.931a.75.75 0 0 1-.175 1.046 19.326 19.326 0 0 0-3.398 3.098.75.75 0 0 1-1.097.04L8.5 8.561l-2.22 2.22A.75.75 0 1 1 5.22 9.72l2.75-2.75a.75.75 0 0 1 1.06 0l1.664 1.663a20.786 20.786 0 0 1 3.122-2.74.75.75 0 0 1 1.046.176Z" clip-rule="evenodd"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <div
                x-data="{ isExpanded: false }"
                class="flex flex-col"
            >
                <button
                    type="button"
                    x-on:click="isExpanded = ! isExpanded"
                    x-bind:aria-expanded="isExpanded ? 'true' : 'false'"
                    class="flex items-center justify-between cursor-pointer rounded-radius gap-4 px-2 py-1.5 text-lg font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300 focus:outline-hidden focus-visible:underline"
                    x-bind:class="isExpanded ? 'text-[#FF4D30]' :  '' "
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 shrink-0" aria-hidden="true">
                        <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"/>
                    </svg>
                    <span class="mr-auto text-left">User Management</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <ul
                    x-cloak
                    x-collapse
                    x-show="isExpanded"
                    class="flex flex-col gap-1 justify-center items-center"
                >

                    <li class="px-1 py-0.5 mt-2">
                        <a
                            href="{{ route('admin.users') }}"
                            wire:navigate
                            wire:current.exact="text-[#FF4D30]"
                            class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-base font-semibold text-[#0D1B2A] hover:text-[#FF4D30] hover:bg-gray-100 rounded-xl focus:outline-hidden focus-visible:underline"
                        >
                            Users
                        </a>
                    </li>

                    <li class="px-1 py-0.5">
                        <a
                            href="{{ route('admin.admins') }}"
                            wire:navigate
                            wire:current="text-[#FF4D30]"
                            class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-base font-semibold text-[#0D1B2A] hover:text-[#FF4D30] hover:bg-gray-100 rounded-xl focus:outline-hidden focus-visible:underline"
                        >
                            Admins
                        </a>
                    </li>

                    <li class="px-1 py-0.5">
                        <a
                            href="{{ route('admin.send-emails') }}"
                            wire:navigate
                            wire:current="text-[#FF4D30]"
                            class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-base font-semibold text-[#0D1B2A] hover:text-[#FF4D30] hover:bg-gray-100 rounded-xl focus:outline-hidden focus-visible:underline"
                        >
                            Send Emails
                        </a>
                    </li>

                </ul>
            </div>

            <div
                x-data="{ isExpanded: false }"
                class="flex flex-col"
            >
                <button
                    type="button"
                    x-on:click="isExpanded = ! isExpanded"
                    x-bind:aria-expanded="isExpanded ? 'true' : 'false'"
                    class="flex items-center justify-between cursor-pointer rounded-radius gap-4 px-2 py-1.5 text-lg font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300 focus:outline-hidden focus-visible:underline"
                    x-bind:class="isExpanded ? 'text-[#FF4D30]' :  '' "
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 shrink-0" aria-hidden="true">
                        <path d="M10.362 1.093a.75.75 0 0 0-.724 0L2.523 5.018 10 9.143l7.477-4.125-7.115-3.925ZM18 6.443l-7.25 4v8.25l6.862-3.786A.75.75 0 0 0 18 14.25V6.443ZM9.25 18.693v-8.25l-7.25-4v7.807a.75.75 0 0 0 .388.657l6.862 3.786Z"/>
                    </svg>
                    <span class="mr-auto text-left">Product Management</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 transition-transform rotate-0 shrink-0" x-bind:class="isExpanded ? 'rotate-180' : 'rotate-0'" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <ul
                    x-cloak
                    x-collapse
                    x-show="isExpanded"
                    class="flex flex-col gap-1 justify-center items-center"
                >

                    <li class="px-1 py-0.5 mt-2">
                        <a
                            href="{{ route('admin.all-products') }}"
                            wire:navigate
                            wire:current="text-[#FF4D30]"
                            class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-base font-semibold text-[#0D1B2A] hover:text-[#FF4D30] hover:bg-gray-100 rounded-xl focus:outline-hidden focus-visible:underline"
                        >
                            Products
                        </a>
                    </li>


                    <li class="px-1 py-0.5">
                        <a
                            href="{{ route('admin.brands') }}"
                            wire:navigate
                            wire:current="text-[#FF4D30]"
                            class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-base font-semibold text-[#0D1B2A] hover:text-[#FF4D30] hover:bg-gray-100 rounded-xl focus:outline-hidden focus-visible:underline"
                        >
                            Brands
                        </a>
                    </li>

                    <li class="px-1 py-0.5">
                        <a
                            href="{{ route('admin.categories') }}"
                            wire:navigate
                            wire:current="text-[#FF4D30]"
                            class="flex items-center rounded-radius gap-2 px-2 py-1.5 text-base font-semibold text-[#0D1B2A] hover:text-[#FF4D30] hover:bg-gray-100 rounded-xl focus:outline-hidden focus-visible:underline"
                        >
                            Categories
                        </a>
                    </li>

                </ul>
            </div>

            <a
                href="{{ route('admin.orders') }}"
                wire:navigate
                wire:current="text-[#FF4D30]"
                class="flex items-center rounded-radius gap-4 px-2 py-1.5 text-lg font-bold text-[#0D1B2A] hover:text-[#FF4D30] transition-colors duration-300 focus-visible:underline focus:outline-hidden"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6 shrink-0" aria-hidden="true">
                    <path d="M6.5 3c-1.051 0-2.093.04-3.125.117A1.49 1.49 0 0 0 2 4.607V10.5h9V4.606c0-.771-.59-1.43-1.375-1.489A41.568 41.568 0 0 0 6.5 3ZM2 12v2.5A1.5 1.5 0 0 0 3.5 16h.041a3 3 0 0 1 5.918 0h.791a.75.75 0 0 0 .75-.75V12H2Z"/>
                    <path d="M6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM13.25 5a.75.75 0 0 0-.75.75v8.514a3.001 3.001 0 0 1 4.893 1.44c.37-.275.61-.719.595-1.227a24.905 24.905 0 0 0-1.784-8.549A1.486 1.486 0 0 0 14.823 5H13.25ZM14.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"/>
                </svg>
                <span>Orders</span>
            </a>

        </div>

        <div
            x-data="{ menuIsOpen: false }"
            class="mt-auto"
            x-on:keydown.esc.window="menuIsOpen = false"
        >
            <button
                type="button"
                class="flex w-full items-center rounded-radius gap-2 p-2 text-left text-[#0D1B2A] font-bold hover:text-[#FF4D30] cursor-pointer focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                x-bind:class="menuIsOpen ? 'text-[#FF4D30] bg-gray-200' : ''"
                x-on:click="menuIsOpen = ! menuIsOpen"
                x-bind:aria-expanded="menuIsOpen"
            >
                <img src="{{$profileURL}}" class="size-10 rounded-full object-cover rounded-radius" alt="avatar" aria-hidden="true"/>

                <div class="flex flex-col">
                    <span class="md:text-base text-sm font-bold overflow-hidden">{{ $user->name }}</span>
                    <span class="w-32 overflow-hidden text-ellipsis md:text-sm text-xs md:w-36">{{ $user->email }}</span>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2" class="ml-auto size-5 shrink-0 -rotate-90 md:rotate-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                </svg>

            </button>

            <div
                x-cloak
                x-show="menuIsOpen"
                class="absolute bottom-20 right-6 z-20 -mr-1 w-48 border-2 divide-y-2 divide-slate-300 border-slate-300 bg-white rounded-lg md:-right-44 md:bottom-4"
                role="menu"
                x-on:click.outside="menuIsOpen = false"
                x-on:keydown.down.prevent="$focus.wrap().next()"
                x-on:keydown.up.prevent="$focus.wrap().previous()"
                x-transition=""
                x-trap="menuIsOpen"
            >

                <div class="flex flex-col items-center py-1.5">

                    <livewire:auth.logout />

                </div>

            </div>
        </div>
    </nav>

    <button
        class="fixed right-4 top-4 z-20 rounded-full bg-[#0D1B2A] text-white p-4 cursor-pointer lg:hidden"
        x-on:click="showSidebar = ! showSidebar"
    >
        <svg x-show="showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5" aria-hidden="true">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
        </svg>

        <svg x-show="! showSidebar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5" aria-hidden="true">
            <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z"/>
        </svg>
    </button>
</div>
