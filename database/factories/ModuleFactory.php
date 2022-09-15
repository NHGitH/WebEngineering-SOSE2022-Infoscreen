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
            'name' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'room_id' => $this->faker->numberBetween(1,10),
            'professors_id' => $this->faker->numberBetween(1,20),
            'courses_id' => $this->faker->numberBetween(1,7),
            'time' => $this->faker->time(),
            'date' => $this->faker->date(),
        ];
    }
}
