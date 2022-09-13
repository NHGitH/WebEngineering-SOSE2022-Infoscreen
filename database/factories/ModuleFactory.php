<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Professor;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'slug' => $this->faker->unique()->slug(),
            'room_id' => $this->faker->numberBetween(1,10),
            'professors_id' => Professor::factory(),
            'courses_id' => Course::factory(),
            'time' => $this->faker->dateTimeBetween('now','+2 weeks'),
        ];
    }
}
