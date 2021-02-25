<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Product;
use Livewire\Livewire;
use Tests\TestCase;

class BasketTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function can_view_basket()
    {
        $this->withoutExceptionHandling();

        $this->get('/view-basket')
            ->assertSuccessful()
            ->assertSeeLivewire('view-basket');
    }


    /** @test */
    public function can_add_item_to_basket()
    {
        $product = Product::create([
            'product_name' => 'Red Balloon Box',
            'product_description' => 'This is a Red Balloon Box',
            'product_price' => 4,
            'product_qty' => 800,
            'photo' => 'images/red-balloon-box.png',
            'active' => 1
        ]);

        $this->get('/')
            ->assertSuccessful()
            ->assertSeeLivewire('add-to-basket');

        Livewire::test('add-to-basket')
            ->set('qty', 10)
            ->call('addtobasket', $product->id);

        $this->assertDatabaseHas('baskets', ['id' => $product->id, 'quantity' => 10]);

    }


}