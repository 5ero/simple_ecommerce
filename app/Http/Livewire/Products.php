<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Products extends Component
{
	public $products;
   

	public function selectProduct($productid)
	{
		$product = Product::findOrFail($productid);
		$this->dispatchBrowserEvent('basket', [
				'title' => $product->product_name,
				'description' =>  $product->product_description,
				'photo' =>  $product->photo,
				'price' => "Price: £".$product->product_price,
				'qty' => $product->product_qty,
				'id' => $productid
		]);
	}

    public function render()
    {
        return view('livewire.products', [
        	$this->products = Product::where('active', true)->get()
        ]);
    }
}
