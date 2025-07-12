<div class="rounded-2xl bg-white shadow-xl sm:w-[500px] w-[310px]">

    <form wire:submit.prevent="login" class="lg:p-11 p-7 mx-auto">
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-11">
            <h1 class="text-[#0D1B2A] text-center font-manrope text-3xl font-bold leading-10 mb-2">Welcome to Byte Zone!</h1>
            <p class="text-[#FF4D30] text-center text-base font-medium leading-6">Log In to your account</p>
        </div>

        <div class="space-y-6">
            <div>
                <label class='text-sm text-[#0D1B2A] font-medium mb-2 block'>Email Address:</label>
                <input
                    wire:model="email"
                    type="email"
                    class="bg-gray-100 w-full text-sm text-[#0D1B2A] px-4 py-3 rounded-md outline-0 border-1 border-[#0D1B2A] focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                />
                <div>
                    @error('email')
                        <span class="text-[#FF4D30] text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <label class='text-sm text-[#0D1B2A] font-medium mb-2 block'>Password:</label>
                <input
                    wire:model="password"
                    type="password"
                    class="bg-gray-100 w-full text-sm text-[#0D1B2A] px-4 py-3 rounded-md outline-0 border-1 border-[#0D1B2A] focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
                />
                <div>
                    @error('password')
                    <span class="text-[#FF4D30] text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                    <input
                        wire:model="remember"
                        type="checkbox"
                        class="h-4 w-4 accent-[#0D1B2A] border-slate-300 rounded focus:ring-2 focus:ring-[#0D1B2A] focus:outline-none"
                    >
                    <label for="remember-me" class="ml-3 block sm:text-sm text-xs text-[#0D1B2A]">
                        Remember me
                    </label>
                </div>
            </div>
        </div>

        <div class="!mt-12">
            <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-[15px] font-medium rounded-md text-white bg-[#FF4D30] hover:bg-[#F53003] focus:outline-none cursor-pointer">
                Log In
            </button>
        </div>

        <div class="mt-4 flex justify-center">
            <p class="text-sm text-[#0D1B2A]">
                Don't have an account?
                <a wire:navigate href="{{ route('register') }}" class="text-[#FF4D30] hover:underline">Register here.</a>
            </p>
        </div>
    </form>


</div>
