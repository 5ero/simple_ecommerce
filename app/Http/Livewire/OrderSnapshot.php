<?php

namespace App\Http\Admin\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderSnapshot extends Component
{
    public function render()
    {
        return view('livewire.order-snapshot', [
            'orders' => Order::where('shipped','=', false)
                ->orderBy('created_at','desc')
                ->take(5)
                ->get()
        ]);
    }
}
