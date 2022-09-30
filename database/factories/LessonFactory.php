<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'module_id' => $this->faker->unique()->numberBetween(1,10),
            'room_id' => $this->faker->numberBetween(1,5),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
        ];
    }
}

