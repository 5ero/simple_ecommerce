<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;
use App\Models\Product;

class AddToBasket extends Component
{
	 public $qty = 0;
     public $stock;
	 public $basket;

    public function increment()
    {
    	$this->qty++;
    }

    public function decrement()
    {
    	$this->qty--;
    }

    public function mount(Basket $basket)
    {
    	$this->basket = $basket;
    }

    public function addtobasket($id)
    {
        $product = Product::where('id', $id)->first();
        $this->stock = $product->product_qty;
    	
    	$this->basket->create([
    		'session_id' => session('_token'),
    		'product_id' => $id,
            'price' => $product->product_price,
            'total' => $product->product_price*$this->qty,
    		'quantity' => $this->qty,
    	]);

		$this->qty = 0;
		$this->emit('updateBasket');	
    	$this->dispatchBrowserEvent('success', 'Item added to basket!');
    }

    public function render()
    {
        return view('livewire.add-to-basket');
    }


}
