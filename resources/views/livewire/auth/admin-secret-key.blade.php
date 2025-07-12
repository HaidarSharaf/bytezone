<div class="rounded-2xl bg-white shadow-xl sm:w-[500px] w-[310px]">

    <form wire:submit.prevent="verify" class="lg:p-11 p-7 mx-auto">

        <div class="mb-11">
            <h1 class="text-[#0D1B2A] text-center font-manrope text-3xl font-bold leading-10 mb-2">Admin Verification</h1>
            <p class="text-[#FF4D30] text-center text-base font-medium leading-6">Please enter your secret code.</p>
        </div>

        <div>
            <label class='text-sm text-[#0D1B2A] font-medium mb-2 block'>Secret:</label>
            <input
                wire:model="secret"
                type="password"
                class="bg-gray-100 w-full text-sm text-[#0D1B2A] px-4 py-3 rounded-md outline-0 border-1 border-[#0D1B2A] focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
            />
            <div>
                @error('secret')
                <span class="text-[#FF4D30] text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="!mt-12">
            <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-[15px] font-medium rounded-md text-white bg-[#FF4D30] hover:bg-[#F53003] focus:outline-none cursor-pointer">
                Verify
            </button>
        </div>

        <div class="mt-4 flex justify-center">
            <p class="text-sm text-[#0D1B2A]">
                Not an admin?
                <a
                    wire:navigate
                    href="{{ route('home') }}"
                    class="text-[#FF4D30] hover:underline"
                >
                    Back to Home
                </a>
            </p>
        </div>
    </form>

</div>
