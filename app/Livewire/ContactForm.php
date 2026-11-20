<?php

namespace App\Livewire;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public bool $isSubmitted = false;

    protected function rules(): array
    {
        return [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|min:3|max:200',
            'message' => 'required|min:10|max:5000',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        // Rate limiting: max 5 messages per hour per IP
        $throttleKey = 'contact-form:'.request()->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $this->addError('rate_limit', app()->getLocale() === 'bn'
                ? "অনুগ্রহ করে {$seconds} সেকেন্ড পর পুনরায় চেষ্টা করুন।"
                : "Too many messages sent. Please try again in {$seconds} seconds.");

            return;
        }

        RateLimiter::hit($throttleKey, 3600);

        $contactMsg = ContactMessage::create([
            'name' => strip_tags(trim($this->name)),
            'email' => strip_tags(trim($this->email)),
            'subject' => strip_tags(trim($this->subject)),
            'message' => strip_tags(trim($this->message)),
            'ip_address' => request()->ip(),
            'is_read' => false,
        ]);

        try {
            Mail::to('ashikaaktar99@gmail.com')->send(new ContactMessageReceived($contactMsg));
        } catch (\Throwable $e) {
            Log::warning('Contact form email notification failed: ' . $e->getMessage());
        }

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->isSubmitted = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
