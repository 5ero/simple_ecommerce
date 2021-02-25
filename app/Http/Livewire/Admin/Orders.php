<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{
    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => Order::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
