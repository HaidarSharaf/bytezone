<div class="flex-1 flex" >
    <main class="flex-1 overflow-auto">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-[#FF4D30]">
                    All Brands
                </h2>
                <div class="flex items-center space-x-4">
                    <a
                        href="{{ route('admin.create-brand') }}"
                        wire:navigate
                        class="hover:bg-[#F53003] bg-[#FF4D30] text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="sm:w-4 sm:h-4 w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="font-semibold sm:text-base text-sm">Create Brand</span>
                    </a>
                </div>
            </div>

            <div class="my-4">
                {{$brands->links()}}
            </div>

            <div
                x-data="{ selected: null }"
                class="bg-gray-200 border border-[#0D1B2A] rounded-lg overflow-x-scroll lg:overflow-x-hidden overflow-y-hidden"
            >
                <table
                    class="w-full"
                >
                    <thead class="border-b border-[#0D1B2A]">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Logo
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Edit
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Delete
                        </th>
                    </tr>
                    </thead>

                    <tbody
                        class="divide-y divide-gray-700"
                    >
                        @forelse($brands as $brand)
                            <tr
                                class="hover:bg-gray-300 transition-colors"
                            >
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded">
                                            <img src=" {{ asset('storage/brands_icons/' . $brand->logo) }}">
                                        </div>
                                    </div>
                                </td>

                                <td
                                    class="px-6 py-4 text-base text-[#0D1B2A] font-semibold"
                                >
                                    {{ $brand->name }}
                                </td>

                                <td
                                    class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                                >
                                    <a
                                        href="{{ route('admin.edit-brand', $brand) }}"
                                        wire:navigate
                                        class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700"
                                    >
                                        Edit
                                    </a>
                                </td>
                                <td
                                    class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                                >
                                    <button
                                        @click="selected = {{ $brand->id }}"
                                        class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 cursor-pointer"
                                    >
                                        Delete
                                    </button>
                                </td>
                             </tr>
                        @empty
                                <tr>
                                    <td
                                        colspan="4"
                                        class="px-6 py-4 text-center text-sm text-[#0D1B2A] font-semibold"
                                    >
                                        No brands found.
                                    </td>
                                </tr>

                        @endforelse
                    </tbody>
                </table>

                <div
                    x-show="selected !== null"
                    x-transition.opacity
                    x-cloak
                    class="fixed inset-0 bg-white/30 backdrop-blur-md z-40"
                ></div>

                <div
                    x-show="selected !== null"
                    x-cloak
                    x-transition
                    class="overflow-y-auto overflow-x-hidden fixed z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                >
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow-sm">
                            <button
                                type="button"
                                @click="selected = null"
                                class="absolute top-3 end-2.5 text-[#0D1B2A] bg-transparent cursor-pointer hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            >
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>

                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-red-500 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>

                                <h3 class="mb-5 text-lg font-semibold text-[#0D1B2A]">Are you sure you want to delete this brand?</h3>
                                <button
                                    type="button"
                                    @click="$wire.deleteBrand(selected); selected = null"
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 cursor-pointer focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                >
                                    Yes, I'm sure
                                </button>

                                <button
                                    type="button"
                                    @click="selected = null"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-[#0D1B2A] cursor-pointer focus:outline-none bg-white hover:bg-gray-200 rounded-lg border border-gray-200 focus:z-10 focus:ring-4 focus:ring-gray-100"
                                >
                                    No, cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="my-4">
                {{$brands->links()}}
            </div>

        </div>
    </main>
</div>






