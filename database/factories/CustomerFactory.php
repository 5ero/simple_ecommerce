<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address_1' => $this->faker->streetAddress,
            'address_2' => '',
            'address_3' => '',
            'city' => $this->faker->city,
            'county' => $this->faker->state,
            'postcode' => $this->faker->postcode,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email
        ];
    }
}
