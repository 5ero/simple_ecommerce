<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    

    /** @test */
    public function can_create_a_customer()
    {
        $user = User::factory()->create();

        $customer = [
            'name' => $this->faker->name,
            'address_1' => $this->faker->streetAddress,
            'address_2' => '',
            'address_3' => '',
            'city' => $this->faker->city,
            'county' =>$this->faker->state,
            'postcode' => $this->faker->postcode,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email
        ];

        $this->actingAs($user)->postJson('/api/customer', $customer)->assertRedirect('/customers');
        $this->actingAs($user)->assertDatabaseCount('customers', 1);
       
    }
}
