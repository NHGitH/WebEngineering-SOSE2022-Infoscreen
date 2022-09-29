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
            'course_id' => $this->faker->numberBetween(1,7),
            'user_id' => $this->faker->numberBetween(1,20),
        ];
    }
}
