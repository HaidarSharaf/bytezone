<?php

namespace App\Livewire\Auth;

use App\Livewire\AuthComponent;
use App\Notifications\EmailOtpNotification;
use Egulias\EmailValidator\Warning\EmailTooLong;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title('Verify Email | Byte Zone')]
class VerifyEmail extends AuthComponent
{
    #[Validate('required')]
    public $otp = '';

    public $email = '';

    public function mount(){
        $user = Auth::user();

        $this->email = $user?->email;

        if($user?->email_verified_at){
            $this->redirect(route('home'), navigate: true);
            return;
        }

        if(!$user->otp_code){
            $this->sendOtp();
        }
    }

    public function sendOtp()
    {
        $user = Auth::user();
        $otp = random_int(100000, 999999);
        $user->otp_code = $otp;
        $user->save();

        $user->notify(new EmailOtpNotification($otp));

        session()->flash('message', 'A new OTP code has been sent.');
    }

    public function verifyOtp(){
        $this->validate();

        $user = Auth::user();

        if ($user->otp_code === $this->otp) {
            $user->email_verified_at = now();
            $user->otp_code = null;
            $user->save();

            $this->redirect(route('home'), navigate: true);
        }

        session()->flash('error', 'Invalid OTP code.');
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
