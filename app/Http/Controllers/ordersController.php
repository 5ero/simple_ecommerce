<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ordersController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function show($order)
    {
        return view('orders.show',[
            'order' => $order,
        ]);
    }
}
