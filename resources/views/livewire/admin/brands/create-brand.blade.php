<div
    class="flex justify-center items-center w-full md:inset-0 md:h-full"
>
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

        <div class="relative p-4 bg-white rounded-lg shadow">

            <div class="flex justify-center items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                <h3 class="lg:text-2xl md:text-xl text-lg font-bold text-[#FF4D30]">
                    Add Brand
                </h3>
            </div>

            <form wire:submit="save">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-semibold text-[#0D1B2A]">Name</label>
                        <input
                            type="text"
                            wire:model="form.name"
                            class="bg-gray-50 border-[#0D1B2A] text-[#0D1B2A] text-sm rounded-lg  block w-full p-2.5 outline-0 border-1 focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                            placeholder="Type brand name"
                        >
                        @error('form.name') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
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
                            Upload Logo

                            <input
                                type="file"
                                class="hidden"
                                wire:model="form.logo"
                                accept="image/*"
                            />
                            <p class="text-xs font-medium text-[#0D1B2A] mt-2">Only PNG, JPG , JPEG, and WEBP are allowed.</p>
                        </label>

                        @if($form->logo)
                            <div class="flex items-center justify-center mt-4">
                                <img src="{{ $form->logo->temporaryUrl() }}" class="w-36 h-36 object-cover">
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
                            Create Brand
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
