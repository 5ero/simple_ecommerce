<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderShow extends Component
{   
    public $order;

    public function mount(Order $order)
	{
		$this->order = $order;
		
	}

    public function render()
    {
        return view('livewire.admin.order-show');
    }
}
