<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'course_id' => $this->faker->numberBetween(1,7),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'picture_path' => Str::random(),
        ];
    }
}

