<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Livewire\Livewire;
use PDO;
use Tests\TestCase;

class ProductTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    /** @test */
    public function can_see_product_create_form()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin/products/create')->assertStatus(200);
    }

    /** @test */
    public function can_create_a_product()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $category = Category::create([
            'name' => 'Computers',
        ]);

        $product = [
            'product_name' => $this->faker->sentence,
            'product_description' => $this->faker->paragraph,
            'product_price' => $this->faker->numberBetween($min = 1000, $max = 2000),
            'product_qty' => $this->faker->numberBetween($min = 0, $max = 800),
            'photo' => 'images/iMac.png',
            'category_id' => 1
        ];

        $this->actingAs($user)->postJson(config('app.url').'/api/products', $product);
        $this->actingAs($user)->assertDatabaseHas('products', $product);

        $this->actingAs($user)->get('/admin/products')->assertSee(Str::title($product['product_name']));
        $this->actingAs($user)->get('/admin/products')->assertSee(Str::limit($product['product_description'], 100));
        $this->actingAs($user)->get('/admin/products')->assertSee($product['product_qty']);
        $this->actingAs($user)->get('/admin/products')->assertSee($product['product_price']);
       
    }

    /** @test */
    public function product_name_product_description_product_qty_product_price_are_required_fields()
    {
        Livewire::test('product-create')
            ->set('product_name', '')
            ->set('product_description', '')
            ->set('product_qty', '')
            ->set('product_price', '')
            ->assertHasErrors(['product_name', 'product_description', 'product_qty', 'product_price']);
    }

     /** @test */
    public function can_see_product_list()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin/products')
                ->assertSee('product-list');
    }


    /** @test */
    public function search_returns_product()
    {

         $productA = Product::create([
            'product_name' => 'A Red Box',
            'product_description' => 'This is a Red Box',
            'product_qty' => 5,
            'product_price' => 5,
            'photo' => 'yellow-box.jpg',
            'active' => true
        ]);

        $productB = Product::create([
            'product_name' => 'A Yellow Box',
            'product_description' => 'This is large a yellow Box',
            'product_qty' => 15,
            'product_price' => 8,
            'photo' => 'red-box.jpg',
            'active' => true
        ]);


        Livewire::test('product-list')
                ->set('search', 'A Red Box')
                ->assertSee($productA->product_name)
                ->assertSee($productA->qty)
                ->assertDontSee($productB->product_name);

    }

    /** @test */
    public function can_only_see_active_products()
    {
         $productA = Product::create([
            'product_name' => 'A Red Box',
            'product_description' => 'This is a Red Box',
            'product_qty' => 5,
            'product_price' => 5,
            'photo' => 'yellow-box.jpg',
            'active' => false
        ]);

        $productB = Product::create([
            'product_name' => 'A Yellow Box',
            'product_description' => 'This is large a yellow Box',
            'product_qty' => 15,
            'product_price' => 8,
            'photo' => 'red-box.jpg',
            'active' => true
        ]);

         Livewire::test('product-list')
                ->assertSee($productB->product_name)
                ->assertSee($productB->qty)
                ->assertDontSee($productA->product_name);

    }
   

}