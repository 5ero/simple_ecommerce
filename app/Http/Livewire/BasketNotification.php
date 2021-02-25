<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;

class BasketNotification extends Component
{

	public $basket;
	public $total = 0;

	public function mount(Basket $basket)
	{
		$this->basket = Basket::where('session_id', session('_token'))->sum('quantity');
        $this->total = Basket::where('session_id', session('_token'))->sum('total');

	}

	protected $listeners = ['updateBasket' => 'updateBasket'];

    public function updateBasket()
    {
        $this->basket = Basket::where('session_id', session('_token'))->sum('quantity');
        $this->total = Basket::where('session_id', session('_token'))->sum('total');
    }

    public function render()
    {
        return view('livewire.basket-notification');
    }
}
