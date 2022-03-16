<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reservation_id' => Reservation::factory(),
            'product_id' => Product::factory(),
            'table' => $this->faker->numberBetween(1,25),
            'status' => 0
        ];
    }
}
