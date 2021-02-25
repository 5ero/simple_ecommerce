<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderCancelled extends Component
{
    public function render()
    {
        return view('livewire.order-cancelled')
            ->layout('layouts.base');
    }
}
