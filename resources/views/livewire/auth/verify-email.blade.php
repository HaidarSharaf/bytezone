<div class="rounded-2xl bg-white shadow-xl sm:w-[500px] w-[310px] p-5">

    <div class="mb-6">
        <h1 class="text-[#0D1B2A] text-center font-manrope text-3xl font-bold leading-10 mb-2">Email Verification</h1>
        <p
            class="text-[#FF4D30] text-center text-base font-medium leading-6"
        >
            An OTP code has been sent to your email address:
            <span class="text-[#0D1B2A]">{{$this->email}}</span>
        </p>
    </div>

    <div class="text-center mb-3">
        @if (session()->has('message'))
            <div class="text-green-600">{{ session('message') }}</div>
        @endif
    </div>



    <div class="mb-4">
        <label class='text-sm text-[#0D1B2A] font-medium mb-2 block'>Enter OTP:</label>
        <input
            wire:model="otp"
            type="password"
            maxlength="6"
            class="bg-gray-100 w-full text-sm text-[#0D1B2A] px-4 py-3 rounded-md outline-0 border-1 border-[#0D1B2A] focus-within:ring-2 focus-within:ring-[#0D1B2A] focus:outline-none"
        />
        <div>
            @if (session()->has('error'))
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @endif
        </div>
    </div>

    <button type="button"
            wire:click="verifyOtp"
            class="w-full shadow-xl py-2.5 px-4 text-[15px] font-medium rounded-md text-white bg-[#FF4D30] hover:bg-[#F53003] focus:outline-none cursor-pointer"
    >
        Verify
    </button>


    <p class="mt-3 text-sm text-[#0D1B2A] text-center">
        Didn’t receive a code?
        <span wire:click="sendOtp" class="text-[#FF4D30] underline cursor-pointer">Resend</span>
    </p>




</div>
