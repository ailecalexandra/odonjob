<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolAdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_id' => Rol::factory()->create()->id,
            'admin_id' => Admin::factory()->create()->id,
        ];
    }
}
