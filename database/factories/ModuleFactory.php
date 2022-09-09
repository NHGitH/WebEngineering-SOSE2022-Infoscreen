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
            'rooms_id' => $this->faker->unique()->randomNumber(),
            'professors_name' => $this->faker->unique()->lastName(),
            'courses_name' => $this->faker->unique()->word(),
            'time' => $this->faker->dateTime(),
        ];
    }
}
