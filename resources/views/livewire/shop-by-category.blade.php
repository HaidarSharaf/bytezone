<section class="bg-white text-[#FF4D30] sm:text-2xl text-lg px-6 py-10 rounded-lg">
    <div class="lg:max-w-6xl md:max-w-xl sm:max-w-lg max-w-md mx-auto">
        <h2 class="font-semibold mb-10 text-center">Categories that might interest you:</h2>

        <div class="flex justify-evenly items-start flex-wrap gap-4">
            @foreach($categories as $category)
            <a
                href="{{ route('category.products', $category->name) }}"
                wire:navigate
                class="flex flex-col items-center justify-center gap-2 bg-gray-200 py-6 rounded-lg hover:bg-gray-300 transition cursor-pointer sm:w-[200px] sm:h-[200px] w-[100px] h-[100px] transition duration-300 hover:scale-110"
                wire:key="{{ $category->id }}"
            >

                <img src="{{ asset('storage/categories_icons/' . $category->logo ) }}" class="sm:w-12 sm:h-12 h-8 w-8">
                <span class="sm:text-lg text-sm text-center font-semibold text-[#0D1B2A]">{{ $category->name  }}</span>

            </a>
            @endforeach
        </div>
    </div>
</section>
