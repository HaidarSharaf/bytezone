<?php

namespace App\Livewire\Admin;

use App\Livewire\AdminComponent;
use App\Models\User;
use App\Notifications\Discount;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

#[Title('Send Emails | Byte Zone')]
class SendEmails extends AdminComponent
{
    use WithFileUploads;

    public $users = [];

    #[Validate('required|string|max:100')]
    public $subject = '';

    #[Validate('required|string|max:1000')]
    public $body = '';

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048')]
    public $image;

    public $image_path= null;

    public function mount()
    {
        $this->users = User::where('notifications', true)
            ->whereNotNull('email_verified_at')
            ->where('is_admin', false)
            ->get();
    }

    public function sendEmail()
    {
        $this->validate();

        if ($this->image) {
            $this->image_path = $this->image->storePublicly("notifications_images", ['disk' => 'public']);
        }

        foreach ($this->users as $user) {
            $user->notify(new Discount(
                subject: $this->subject,
                body: $this->body,
                imagePath: $this->image_path,
                senderEmail: auth()->user()->email,
                senderName: auth()->user()->name
            ));
        }

        $this->reset(['subject', 'body', 'image']);
    }

    public function render()
    {
        return view('livewire.admin.send-emails');
    }
}
