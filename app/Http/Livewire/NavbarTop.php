<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;


class NavbarTop extends Component
{

	public $basket;
	public $mobile = false;

	public function mount(Basket $basket)
	{
		$this->basket = Basket::where('session_id', session('_token'))->sum('quantity');

	}

    public function render()
    {
        return view('livewire.navbar-top');
    }
}
