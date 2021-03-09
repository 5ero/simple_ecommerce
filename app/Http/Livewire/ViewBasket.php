<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;
use App\Helpers\Money;

class ViewBasket extends Component
{
	public $basket;
	public $products;
	public $vat;
	public $value;
	public $total;

	
	public function mount(Basket $basket){
		$this->basket = Basket::where('session_id', session('_token'))->get();
		$this->value = Basket::where('session_id', session('_token'))->sum('total');
		$this->vat = Money::vat($this->value);
		$this->total = Money::total($this->value);

	}

	public function removeItemFromBasket($id)
	{
		$item = Basket::find($id);
		$this->dispatchBrowserEvent('success', 'The item "'.$item->products[0]->product_name.'" has been removed from your basket');
		$item->delete();
		$this->basket = Basket::where('session_id', session('_token'))->get();
		$this->value = Basket::where('session_id', session('_token'))->sum('total');
		$this->total = Money::total($this->value);
		$this->vat = Money::vat($this->value);
		$this->emit('updateBasket');	
	}

    public function render()
    {
        return view('livewire.view-basket')
        		->layout('layouts.base');
    }
}
