<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model= Admin::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Admin::NAME => $this->faker->name,
            Admin::EMAIL => $this->faker->email,
            Admin::PASSWORD => bcrypt('secret'),
        ];
    }
}
