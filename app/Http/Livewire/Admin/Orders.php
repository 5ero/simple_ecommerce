<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use App\Helpers\Money;

class Orders extends Component
{
    use WithPagination;

    public $search;
    public $shipped = false;
    public $order;

    public function updatingSearch()
	{
		$this->resetPage();
	}


    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => Order::where('shipped', $this->shipped)
                ->where('order_no','like', '%'.$this->search.'%')
                ->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
