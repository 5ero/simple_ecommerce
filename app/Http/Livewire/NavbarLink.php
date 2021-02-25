<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavbarLink extends Component
{
	public $slot;
	public $active;



    public function render()
    {
        return view('livewire.navbar-link');
    }
}
