<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderSnapshot extends Component
{
    public function render()
    {
        return view('livewire.admin.order-snapshot',[
            'orders' => Order::where('shipped','=', false)
                ->orderBy('created_at','desc')
                ->take(5)
                ->get()
        ]);
    }
}
