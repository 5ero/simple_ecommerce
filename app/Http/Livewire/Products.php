<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Products extends Component
{
	use WithPagination;

	public $sortDirection='asc';
	public $field='id';
  

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

	public function sort()
	{
		$this->field = 'product_price';
		
	}


    public function render()
    {			
        return view('livewire.products', [
			'products' => Product::orderBy($this->field, $this->sortDirection)
										->where('active', true)
										->paginate(10)
		]);
    }
}
