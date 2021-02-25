<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;

class ViewBasket extends Component
{
	public $basket;
	public $products;
	public $total;


	public function mount(Basket $basket){
		$this->basket = Basket::where('session_id', session('_token'))->get();
		$this->total = Basket::where('session_id', session('_token'))->sum('total');
	}

	public function removeItemFromBasket($id)
	{
		$item = Basket::find($id);
		$this->dispatchBrowserEvent('success', 'The item "'.$item->products[0]->product_name.'" has been removed from your basket');

		$item->delete();
		$this->basket = Basket::where('session_id', session('_token'))->get();
		$this->total = Basket::where('session_id', session('_token'))->sum('total');

		$this->emit('updateBasket');	
	}

    public function render()
    {
        return view('livewire.view-basket')
        		->layout('layouts.base');
    }
}
