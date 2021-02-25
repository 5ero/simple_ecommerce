<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\Http;
use Livewire\Component;



class Checkout extends Component
{


    public function render()
    {

        return view('livewire.checkout')
        	->layout('layouts.base');
    }
}
