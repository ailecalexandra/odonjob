<?php

namespace Database\Factories;

use App\Models\DentalHistory;
use App\Models\Type;
use App\Models\TypePay;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(30,50),
            'user_id' => User::factory()->create()->id,
            'dental_history_id' => DentalHistory::factory()->create()->id,
            ];
    }
}
