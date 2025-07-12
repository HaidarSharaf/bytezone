<div class="flex flex-col items-center">

    <div class="mb-10 w-full">
        <livewire:search />
    </div>

    <div class="relative">
        <div class="absolute lg:top-70 md:top-60 lg:left-66 md:left-35 sm:top-40 sm:left-30 top-30 left-15 z-30 flex flex-col space-y-5 justify-center items-center">
            <div
                x-data="{ y: 0, direction: 1 }"
                x-init="
                    setInterval(() => {
                        if (y >= 10) direction = -1;
                        if (y <= -10) direction = 1;
                        y += direction;
                    }, 30);
                "
              :style="'transform: translateY(' + y + 'px)'"
              class="inline-block transition-transform duration-100 ease-in-out"
            >
                <svg fill="#FF4D30" class="lg:w-20 lg:h-20 sm:w-16 sm:h-16 w-10 h-10" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon points="283.7,298.7 283.7,0 198.3,0 198.3,298.7 70.3,298.7 241,512 411.7,298.7 "></polygon> </g></svg>
            </div>
            <a
                wire:navigate
                href="{{ route('products') }}"
                class="bg-[#FF4D30] text-white lg:p-2 p-1 lg:text-base sm:text-sm text-xs rounded-md font-bold cursor-pointer hover:bg-[#F53003]">
                Shop Now
            </a>
        </div>

        <img src="images/home_image.png" class="sm:w-[1000px] lg:h-[700px] md:h-[600px] sm:h-[450px] h-[320px] w-[300px] rounded-md">

        <div class="absolute bottom-5 lg:left-50 md:left-20 sm:left-10 z-30">
            <p class="text-white bg-[#FF4D30] font-extrabold lg:text-xl sm:text-base text-xs text-center p-2 rounded-xl">"Power, Performance, ByteZone  — Where Tech Clicks. "</p>
        </div>

    </div>

    <div
        class="flex flex-col items-center mt-10 space-y-3 border-b-2 pb-5 border-b-[#0D1B2A] w-[80%]"
    >
        <h1 class="lg:text-5xl sm:text-3xl text-2xl font-bold">
            <span class="text-[#F53003]">Byte Zone</span>
        </h1>
        <p class="lg:text-xl sm:text-lg text-base font-bold text-center text-[#0D1B2A]">
            More than just bytes — it’s a whole zone of tech.
        </p>
    </div>

    <div class="bg-[#0D1B2A] md:px-6 md:py-3 px-3 py-2 mt-10 mb-5 rounded-md">
        <div class="flex items-center justify-center text-center">
            <p class="md:text-[20px] sm:text-base text-sm text-white text-center font-semibold pr-6 leading-relaxed">Our Best Sellers! Here's what you're missing out on.</p>
        </div>
    </div>

    <div>
        <livewire:products-slider :products="$bestSellers"/>
    </div>


    <div class="bg-[#FF4D30] md:px-6 md:py-3 px-3 py-2 mt-10 mb-5 rounded-md">
        <div class="flex items-center justify-center text-center ">
            <p class="md:text-[20px] sm:text-base text-sm text-white font-semibold pr-6 leading-relaxed">Limited Time Offers! - Benefit from a sale up to
                {{$discount}}% off -
                <span class="ml-1">Shop Now!</span>
            </p>
        </div>
    </div>

    <div>
        <livewire:products-slider :products="$discountedProducts"/>
    </div>



    <div class="container bg-white px-6 py-12 mt-8">
        <div class="text-center">
            <p class="font-medium text-[#FF4D30]">Contact us</p>

            <h1 class="mt-2 text-2xl font-semibold [#0D1B2A] md:text-3xl">Get in touch</h1>

            <p class="mt-3 text-[#0D1B2A]">Our friendly team is always available to answer your questions!</p>
        </div>

        <div class="flex flex-wrap gap-6 mt-5 justify-center items-center">
            <div class="flex flex-col items-center justify-center text-center mb-6 w-full md:w-[30%]">
                <span class="p-3 text-[#FF4D30] rounded-full bg-[#FF4D30]/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </span>

                <h2 class="mt-4 text-lg font-medium text-[#0D1B2A]">Email</h2>
                <p class="mt-2 text-[#0D1B2A]">Our friendly team is here to help.</p>
                <p class="mt-2 font-semibold text-[#FF4D30]">bytezone@gmail.com</p>
            </div>

            <div class="flex flex-col items-center justify-center text-center mb-6 w-full md:w-[30%]">
                <span class="p-3 text-[#FF4D30] rounded-full bg-[#FF4D30]/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                </span>

                <h2 class="mt-4 text-lg font-medium text-[#0D1B2A]">Location</h2>
                <p class="mt-2 text-[#0D1B2A]">Visit our Shop!</p>
                <p class="mt-2 font-semibold text-[#FF4D30]">Foch Street, Downtown Beirut, Lebanon</p>
            </div>

            <div class="flex flex-col items-center justify-center text-center mb-6 w-full md:w-[30%]">
                <span class="p-3 text-[#FF4D30] rounded-full bg-[#FF4D30]/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                </span>

                <h2 class="mt-4 text-lg font-medium text-[#0D1B2A]">Phone</h2>
                <p class="mt-2 text-[#0D1B2A]">Mon-Sat from 8:00 am to 5:00 pm.</p>
                <p class="mt-2 font-semibold text-[#FF4D30]">+961 70975761</p>
            </div>
        </div>
    </div>



</div>


