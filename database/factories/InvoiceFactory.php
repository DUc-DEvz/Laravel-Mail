<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'amount' => $this->faker->randomFloat(2, 50, 1000),
            'status' => rand(0, 3),
            'due_date' => $this->faker->date(),
            'paid_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
