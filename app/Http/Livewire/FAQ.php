<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FAQ extends Component
{
    public function render()
    {
        return view('livewire.faq')
        ->layout('layouts.base');
    }
}
