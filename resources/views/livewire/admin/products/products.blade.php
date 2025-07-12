<div class="flex-1 flex" >
    <main class="flex-1 overflow-auto">

        <div class="p-6">

            <div class="flex items-center justify-between mb-6">

                <h2 class="text-xl font-semibold text-[#FF4D30]">
                    All Products
                </h2>

                <div class="flex items-center space-x-4">
                    <a
                        href="{{ route('admin.create-product') }}"
                        wire:navigate
                        class="hover:bg-[#F53003] bg-[#FF4D30] text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-colors cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="sm:w-4 sm:h-4 w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="font-semibold sm:text-base text-sm">Create Product</span>
                    </a>

                </div>
            </div>

            <div class="flex items-center justify-evenly mb-6 flex-wrap gap-3">

                <div class="flex items-center space-x-2">
                    <label class="text-[#0D1B2A] sm:text-base text-sm font-semibold">Search:</label>
                    <input
                        wire:model.live="text"
                        type="text"
                        class="bg-gray-100 w-full text-sm text-[#0D1B2A] px-4 sm:py-2 py-1 rounded-md outline-0 border-1 border-[#0D1B2A] focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                    />
                </div>

                <div class="flex flex-col sm:flex-row items-center sm:gap-8 gap-3 flex-wrap">
                    <div class="flex justify-evenly items-center border-0 border-b-2 border-[#0D1B2A] cursor-pointer">
                        <select
                            wire:model.live="category"
                            class="block py-2.5 px-0 w-full min-w-50 text-sm font-semibold text-[#0D1B2A] bg-transparent appearance-none focus:outline-none focus:ring-0 peer"
                        >
                            <option selected class="font-bold">
                                Category
                            </option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </div>

                    <div class="flex justify-evenly items-center border-0 border-b-2 border-[#0D1B2A] cursor-pointer">
                        <select
                            wire:model.live="brand"
                            class="block py-2.5 px-0 w-full min-w-50 text-sm font-semibold text-[#0D1B2A] bg-transparent appearance-none focus:outline-none focus:ring-0 peer"
                        >
                            <option selected class="font-bold">
                                Brand
                            </option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </div>

                </div>

                <div>

                    <button @class([
                        "text-white bg-[#0D1B2A] p-2 rounded-lg cursor-pointer",
                        'bg-red-600' => $showOutOfStock,
                        'bg-red-300' => !$showOutOfStock
                    ])
                            wire:click="toggleOutOfStock"
                    >
                        Out of Stock
                    </button>

                </div>

                <button
                    wire:click="resetFilters"
                    @disabled(!($this->text || $this->category || $this->brand || $this->showOutOfStock === true))
                    class="text-base px-3 py-2 rounded-lg cursor-pointer transition text-white bg-[#0D1B2A] hover:bg-slate-900 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    Reset Filters
                </button>
            </div>

            <div class="my-4">
                {{ $products->links() }}
            </div>

            <div
                class="bg-gray-200 border border-[#0D1B2A] rounded-lg overflow-x-scroll lg:overflow-x-hidden overflow-y-hidden"
                x-data = "{ selected: null, selectedId: null }"
            >
                <table class="w-full">
                    <thead class="border-b border-[#0D1B2A]">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Product
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Category
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Brand
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Price
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Discount %
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Price After Discount
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Stock
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-bold text-[#FF4D30] uppercase tracking-wider"
                        >
                            Status
                        </th>
                    </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-700">
                    @forelse($products as $product)
                        <tr
                            @click="selected === {{ $product->id }} ? selected = null : selected = {{ $product->id }}"
                            :class="{ 'bg-gray-400': selected === {{ $product->id }} }"
                            class="hover:bg-gray-400 cursor-pointer transition-colors"
                            wire:key="{{ $product->id }}"
                        >
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">

                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded">
                                            <img src=" {{ asset('storage/brands_icons/' . $product->brand->logo) }}">
                                        </div>
                                    </div>

                                    <div class="ml-4">
                                        <div
                                            class="text-sm font-bold text-[#0D1B2A]"
                                        >
                                            {{ Str::limit($product->name, 50) }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ $product->category->name }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ $product->brand->name }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                $ {{ number_format($product->price, 2) }}
                            </td>

                            <td
                                class="px-6 py-4 text-sm md:ml-2 text-[#0D1B2A] font-semibold"
                            >
                                {{ $product->discount }} %
                            </td>

                            @if($product->discount > 0)

                                <td
                                    class="px-6 py-4 text-sm text-green-700 font-semibold"
                                >
                                    $ {{ $this->getDiscountedPrice($product->price, $product->discount) }}
                                </td>
                            @else
                                <td
                                    class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                                >
                                    -
                                </td>
                            @endif

                            <td
                                class="px-6 py-4 text-sm text-[#0D1B2A] font-semibold"
                            >
                                {{ $product->stock }}
                            </td>



                            <td class="px-6 py-4">
                        <span
                            @class([
                                'px-2 inline-flex text-xs leading-5 font-semibold rounded-lg text-white',
                                'bg-green-600' => $product->stock > 0,
                                'bg-red-600 ' => $product->stock  == 0
                            ])
                        >
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                            </td>
                        </tr>

                        <tr
                            class="w-full bg-gray-200 border-t border-[#0D1B2A]"
                            x-show="selected === {{ $product->id }}"
                        >

                            <td colspan="7" class="space-y-6 p-6">

                                <div
                                    class="h-48 flex items-center justify-evenly flex-wrap"
                                >
                                    @foreach($product->images as $index => $image)
                                        <div class="w-24 h-24 rounded">
                                            <img src=" {{ asset('storage/products_images/' . $product->id . '/' . $image ) }}">
                                        </div>
                                    @endforeach

                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-base font-bold text-[#0D1B2A] mb-1">Description</label>
                                        <p
                                            class="text-sm font-medium text-[#0D1B2A] ml-3"
                                        >
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                </div>


                                <div class="flex space-x-3 justify-end">
                                    <a
                                        href="{{ route('admin.edit-product', $product) }}"
                                        wire:navigate
                                        class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition-colors cursor-pointer"
                                    >
                                        Edit
                                    </a>

                                    <button
                                        @click="selectedId = {{ $product->id }}"
                                        class="px-4 py-2 border bg-red-600 text-white hover:bg-red-700 rounded-lg transition-colors cursor-pointer"
                                    >
                                        Delete
                                    </button>

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="8"
                                class="px-6 py-4 text-center text-sm text-[#0D1B2A] font-semibold"
                            >
                                No brands found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>

                <div
                    x-show="selectedId !== null"
                    x-transition.opacity
                    x-cloak
                    class="fixed inset-0 bg-white/30 backdrop-blur-md z-40"
                ></div>

                <div
                    x-show="selectedId !== null"
                    x-cloak
                    x-transition
                    class="overflow-y-auto overflow-x-hidden fixed z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                >
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow-sm">
                            <button
                                type="button"
                                @click="selectedId = null"
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

                                <h3 class="mb-5 text-lg font-semibold text-[#0D1B2A]">Are you sure you want to delete this product?</h3>
                                <button
                                    type="button"
                                    @click="$wire.deleteProduct(selectedId); selectedId = null"
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 cursor-pointer focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                                >
                                    Yes, I'm sure
                                </button>

                                <button
                                    type="button"
                                    @click="selectedId = null"
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
                {{ $products->links() }}
            </div>
        </div>

    </main>

</div>
