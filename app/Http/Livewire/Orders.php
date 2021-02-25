<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        return view('livewire.admin.orders')
            ->layout('layouts.app');
    }
}
