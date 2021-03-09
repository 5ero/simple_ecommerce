<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;
use App\Helpers\Money;

class BasketNotification extends Component
{

	public $basket;
    public $total;
	public $value = 0;

	public function mount(Basket $basket)
	{
		$this->basket = Basket::where('session_id', session('_token'))->sum('quantity');
        $this->value = Basket::where('session_id', session('_token'))->sum('total');
        $this->total = Money::total($this->value);
	}

	protected $listeners = ['updateBasket' => 'updateBasket'];

    public function updateBasket()
    {
        $this->basket = Basket::where('session_id', session('_token'))->sum('quantity');
        $this->value = Basket::where('session_id', session('_token'))->sum('total');
        $this->total = Money::total($this->value);
    }

    public function render()
    {
        return view('livewire.basket-notification');
    }
}
