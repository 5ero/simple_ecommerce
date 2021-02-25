<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
	use WithPagination;

	public $search;
	public $active = true;
	public $product;

	public function active($id)
	{
		session()->flash('message', 'Post successfully updated.');		
	}

	public function updatingSearch()
	{
		$this->resetPage();
	}

    public function render()
    {
        return view('livewire.product-list',[
        	'products' => Product::where('active', $this->active)
        		->where('product_name', 'like', '%'.$this->search.'%')
        		->paginate(10),
        ]);
    }
}
