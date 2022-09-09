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
            'room_id' => Room::factory(),
            'professor_id' => Professor::factory(),
            'course_id' => Course::factory(),
            'time' => $this->faker->dateTime(),
        ];
    }
}
