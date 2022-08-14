<?php

namespace Database\Factories;

use App\Models\DetailFather;
use App\Models\DetailMother;
use App\Models\Location;
use App\Models\Referred;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'born_date' => $this->faker->date(),
            'location_id' => Location::factory()->create()->id,
            'sector_id' => Sector::factory()->create()->id,
            'user_id'=> User::factory()->create()->id,
            'referred_id' => Referred::factory()->create()->id,
            'detail_mother_id' => DetailMother::factory()->create()->id,
            'detail_father_id' => DetailFather::factory()->create()->id,

        ];
    }
}
