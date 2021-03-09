<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Product;
use App\Models\Category;
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
        $this->withoutExceptionHandling();
        
        $category = Category::create([
            'name' => 'Computers'
        ]);

        $product = Product::create([
            'product_name' => 'MacBook Pro',
            'product_description' => 'Super fast laptop',
            'product_price' => 2000,
            'product_qty' => 800,
            'photo' => 'images/MacBookPro.png',
            'active' => 1,
            'category_id' => 1
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