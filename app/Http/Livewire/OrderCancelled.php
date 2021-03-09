<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;

class OrderCancelled extends Component
{
    public function render()
    {
        Basket::where('session_id', session('_token'))->delete();
        $this->emit('updateBasket');
        return view('livewire.order-cancelled')
            ->layout('layouts.base');
    }
}
