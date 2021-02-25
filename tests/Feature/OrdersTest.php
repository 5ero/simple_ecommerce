<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    use RefreshDatabase;
    
    /** @Tests  */
    public function can_create_an_order()
    {
        $order = Order::create([
            'order_no' => 'BBL'.time(),
            'products' => "['45','44','46']",
            'status' => 'PAID',
            'shipped' => '1',
            'shipped_date' => '2021-01-29 14:30:22'
        ]);

        

    }

}
