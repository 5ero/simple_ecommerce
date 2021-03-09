<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Helpers\Money;
use App\Models\Basket;

class Box extends Component
{
    public $product;
    public $qty = 0;
    public $stock;
	

    public function mount($product)
    {
        $this->product = Product::findBySlug($product);
    }

    protected $rules = [
        'qty' => 'required|integer'
    ];

    public function updated($propertyName)
	{
		$this->validateOnly($propertyName);
	}


    public function increment()
    {
    	$this->qty++;
    }

    public function decrement()
    {
    	
        $this->qty--;
        
    }

    public function addtobasket()
    {
        $this->validate();

        if($this->qty < 1){
            $this->show = true;
            $this->dispatchBrowserEvent('danger', 'You have to add a quantity');
        } else {
            $product = Product::findBySlug($this->product['slug']);
            $this->stock = $product->product_qty;
            
    	    Basket::create([
                'session_id' => session('_token'),
                'product_id' => $product->id,
                'price' => $product->product_price,
                'total' => $product->product_price*$this->qty,
                'quantity' => $this->qty,
    	    ]);
            
           
            $this->qty = 0;
            $this->emit('updateBasket');	
            $this->dispatchBrowserEvent('success', 'Item added to basket!');
           
            return redirect()->route('products');
        }

        
    }

    public function render()
    {
        return view('livewire.box')
            ->layout('layouts.base');
    }
}