<?php

namespace Database\Factories;

use App\Models\DetailFather;
use App\Models\DetailMother;
use App\Models\Location;
use App\Models\Referred;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DentalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraph(1),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
