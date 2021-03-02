<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    /** @test  */
    public function can_create_an_order()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $customer = Customer::factory()->create();

        $product = [
            'product_name' => $this->faker->sentence,
            'product_description' => $this->faker->paragraph,
            'product_price' => $this->faker->numberBetween($min = 1000, $max = 2000),
            'product_qty' => $this->faker->numberBetween($min = 0, $max = 800),
            'category_id' => 1
        ];
        $this->actingAs($user)->postJson(config('app.url').'/api/products', $product);

        $p = Product::find(1);

        $order = Order::create([
            'order_no' => '100001',
            'customer_id' => $customer->id,
            'products' => [
                [
                    'product_id' => $p->id,
                    'product' => $p->product_name,
                    'product_price' => $p->product_price,
                    'product_qty' => 5
                ],
                [
                    'product_id' => $p->id,
                    'product' => $p->product_name,
                    'product_price' => $p->product_price,
                    'product_qty' => 100
                ],
                
            ],
            'order_value' => $p->qty*$p->product_price,
            'status' => 'PAID',
            'shipped' => 0,
            'shipped_date' => ''
        ]);

        $this->actingAs($user)->get('/admin/orders')
                ->assertSee('orders');

        

    }

}
