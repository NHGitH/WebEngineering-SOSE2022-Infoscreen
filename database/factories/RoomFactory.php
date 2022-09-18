<?php

namespace Database\Factories;

use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->numberBetween(1,20),
            'slug' => $this->faker->slug,
            'building_id' => $this->faker->numberBetween(1,5),
        ];
    }
}