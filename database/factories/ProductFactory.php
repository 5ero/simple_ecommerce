<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence,
            'product_description' => $this->faker->paragraph,
            'product_price' => $this->faker->numberBetween($min=1200, $max=2000),
            'product_qty' => $this->faker->numberBetween($min=0, $max=800)
        ];
    }
}
