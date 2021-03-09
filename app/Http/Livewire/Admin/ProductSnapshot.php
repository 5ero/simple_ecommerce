<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductSnapshot extends Component
{
    public function render()
    {
        return view('livewire.admin.product-snapshot',[
            'products' => Product::where('active', true)->get()
        ]);
    }
}
