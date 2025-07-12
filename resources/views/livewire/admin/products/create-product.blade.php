<div
    class="flex justify-center items-center w-full md:inset-0 md:h-full"
>
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

        <div class="relative p-4 bg-white rounded-lg shadow">

            <div class="flex justify-center items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="lg:text-2xl md:text-xl text-lg font-bold text-[#FF4D30]">
                    Add Product
                </h3>
            </div>

            <form wire:submit="save">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-sm font-semibold text-[#0D1B2A]">Name</label>
                        <input
                            type="text"
                            wire:model="form.name"
                            class="bg-gray-50 border-[#0D1B2A] text-[#0D1B2A] text-sm rounded-lg  block w-full p-2.5 outline-0 border-1 focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                            placeholder="Type product name"
                        >
                        @error('form.name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-[#0D1B2A]">Price</label>
                        <input
                            type="number"
                            wire:model="form.price"
                            class="bg-gray-50 border-[#0D1B2A] text-[#0D1B2A] text-sm rounded-lg  block w-full p-2.5 outline-0 border-1 focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                            placeholder="$"
                        >
                        @error('form.price') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-[#0D1B2A]">Stock</label>
                        <input
                            type="number"
                            wire:model="form.stock"
                            class="bg-gray-50 border-[#0D1B2A] text-[#0D1B2A] text-sm rounded-lg  block w-full p-2.5 outline-0 border-1 focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                            placeholder="#"
                        >
                        @error('form.stock') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-[#0D1B2A]">Discount</label>
                        <input
                            type="number"
                            wire:model="form.discount"
                            class="bg-gray-50 border-[#0D1B2A] text-[#0D1B2A] text-sm rounded-lg  block w-full p-2.5 outline-0 border-1 focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                            placeholder="%"
                        >
                        @error('form.discount') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-6 ml-4">
                        <div class="flex justify-evenly items-center border-0 border-b-2 border-[#0D1B2A] cursor-pointer w-full">
                            <select
                                wire:model="form.brand_id"
                                class="block py-2.5 px-0 w-full text-sm font-semibold text-[#0D1B2A] bg-transparent appearance-none focus:outline-none focus:ring-0 peer"
                            >
                                <option selected class="font-bold ">
                                    Choose a Brand
                                </option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </div>
                        @error('form.brand_id') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-6 ml-4">
                        <div class="flex justify-evenly items-center border-0 border-b-2 border-[#0D1B2A] cursor-pointer">
                            <select
                                wire:model="form.category_id"
                                class="block py-2.5 px-0 w-full text-sm font-semibold text-[#0D1B2A] bg-transparent appearance-none focus:outline-none focus:ring-0 peer"
                            >
                                <option selected class="font-bold">
                                    Choose a Category
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </div>
                        @error('form.category_id') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-2 mt-2">
                        <label class="block mb-2 text-sm font-semibold text-[#0D1B2A] ">Description</label>
                        <textarea
                            rows="4"
                            wire:model="form.description"
                            class="block p-2.5 w-full text-sm text-[#0D1B2A] bg-gray-50 rounded-lg border-1 outline-0 focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                            placeholder="Write product description here..."
                        ></textarea>
                        @error('form.description') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4 mb-2 sm:col-span-2">
                        <label
                               class="bg-white text-[#0D1B2A] font-semibold text-base rounded w-full h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-3 fill-[#0D1B2A]" viewBox="0 0 32 32">
                                <path
                                    d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                    data-original="#000000" />
                                <path
                                    d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                    data-original="#000000" />
                            </svg>
                            Upload Images

                            <input
                                type="file"
                                class="hidden"
                                wire:model="form.images"
                                multiple
                                accept="image/*"
                            />
                            <p class="text-xs font-medium text-[#0D1B2A] mt-2">Only PNG, JPG , JPEG, and WEBP are allowed.</p>
                        </label>

                        @if(!empty($form->images))
                            <div class="mt-2 flex items-center gap-2 justify-evenly flex-wrap">
                                @foreach($form->images as $index => $image)
                                    <div class="relative">
                                        <img src="{{ $image->temporaryUrl() }}" class="w-20 h-20 object-cover">

                                        <button type="button"
                                                wire:click="removeImage({{ $index }})"
                                                class="absolute top-0 right-0 bg-red-600 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center hover:bg-red-700 cursor-pointer">
                                            &times;
                                        </button>
                                    </div>


                                @endforeach
                            </div>
                       @endif

                    </div>
                </div>

                <div class="flex justify-end">
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="cursor-pointer disabled:cursor-not-allowed text-white bg-[#FF4D30] hover:bg-[#F53003] focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    >
                        <div
                            class="flex items-center font-semibold"
                            wire:loading.remove
                            wire:target="save"
                        >
                            <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Create Product
                        </div>

                        <div wire:loading wire:target="save">
                            <livewire:loader />
                        </div>

                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
