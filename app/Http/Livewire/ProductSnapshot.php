<?php

namespace App\Http\Admin\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSnapshot extends Component
{
	

    public function render()
    {
        return view('livewire.product-snapshot', [
        	'products' => Product::where('active', true)->get()
        ]);
    }
}
