<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Mail\orderReceived;
use Illuminate\Support\Facades\Mail;

class OrderSuccess extends Component
{

    public function render()
    {
        $basket = Basket::where('session_id', session('_token'))->get();
        $ord = Order::orderBy('created_at', 'desc')->first();
        $order = new Order;
       
        //Set order number
        if(empty($ord)){
            $order->order_no = 100000;
        } else {
            $order->order_no = $ord->order_no+1;
        }
        
        //Set products
        $products = array();
        $customer_id = '';
        $prices = array();

        foreach($basket as $item){
            
            $products[] = 
            [
             'product_id' => $item->product_id,
             'product' => $item->products[0]['product_name'],
             'product_price' => $item->price,
             'product_qty' => $item->quantity
            ];

            $prices[] = $item->price*$item->quantity;
           
           
            $customer_id = $item->customer_id;
        }

        $total = array_sum($prices);

        $order->products = $products;

        //Order value
        $order->order_value = $total;

        //Order status
        $order->status = 'PAID';

        //Get the customer
        $order->customer_id = $customer_id;
        
        //Save order
        $order->save();

        
        //Kill the basket items
        $deleteBaskets = Basket::where('session_id', session('_token'))->delete();
        $this->emit('updateBasket');

        //Send email confirmation of order
        $customer = Customer::find($order->customer_id);
        Mail::to($customer->email)->send(new orderReceived($order));

        //Update stock quantities after order
        foreach($products as $product){
            $p = Product::find($product['product_id']);
            $p->product_qty = ($p->product_qty - $product['product_qty']);
            $p->save();
        }
        
        return view('livewire.order-success')
            ->layout('layouts.base');
    }
}
