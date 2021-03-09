<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Boxes extends Component
{
    public function render()
    {
        return view('livewire.boxes')
            ->layout('layouts.base');
    }
}
