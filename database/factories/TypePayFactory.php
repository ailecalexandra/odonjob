<?php

namespace Database\Factories;

use App\Models\Pay;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypePayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_id' => Type::factory()->create()->id,
            'pay_id' => Pay::factory()->create()->id,
        ];
    }
}
