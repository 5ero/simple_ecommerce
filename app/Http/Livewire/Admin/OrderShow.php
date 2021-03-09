<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Helpers\Money;

class OrderShow extends Component
{   
    public $order;
    public $vat;
    public $total;

    public function mount(Order $order)
	{
		$this->order = $order;
        $this->vat = Money::vat($order->order_value);
        $this->total = Money::total($order->order_value);
		
	}

    public function shipped()
    {
        $this->order->update([
            'shipped' => true,
            'shipped_date' => \Carbon\Carbon::Now()
        ]);

    }

    public function render()
    {
        return view('livewire.admin.order-show');
    }
}
