<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\sendMessage;
use Illuminate\Support\Facades\Mail;

class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $msg;

    public function sendMessage()
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->msg
        ];
        
        Mail::to(config('mail.to.address'), config('mail.to.name'))->send(new sendMessage($data));
        
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->msg = '';

        $this->dispatchBrowserEvent('success', 'Your message has been sent!');
    }

    public function render()
    {
        return view('livewire.contact')
        ->layout('layouts.base');
    }
}
