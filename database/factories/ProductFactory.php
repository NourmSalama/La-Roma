<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->slug(),
            'type' => $this->faker->randomElement(['alc-drink', 'warm-drink' , 'cold-drink' , 'appetizers', 'main-dish' , 'dessert']),
            'price' => $this->faker->numberBetween(1,50),
            'quantity' => $this->faker->numberBetween(1,50),
        ];
    }
}
