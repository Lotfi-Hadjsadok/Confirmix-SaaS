<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Employer;
use App\Enums\OrderStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'product_id' => Product::factory(),
            'employee_id' => Employee::factory(),
            'employer_id' => Employer::factory(),
            'quantity' => $this->faker->numberBetween(1, 50),
            'product_price' => $this->faker->numberBetween(1000, 10000),
            'total_price' => $this->faker->numberBetween(1000, 10000),
            'shipping_cost' => $this->faker->numberBetween(400, 1200),
            'status' => $this->faker->randomElement(OrderStatus::cases())->value,
        ];
    }
}