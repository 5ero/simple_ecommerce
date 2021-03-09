<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Customers extends Component
{   
    use WithPagination;
    
    public $customer;


    
    public function render()
    {
        return view('livewire.admin.customers',[
            'customers' => Customer::all()
        ]);
    }
}
