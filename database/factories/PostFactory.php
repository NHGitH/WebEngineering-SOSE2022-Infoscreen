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
            'user_id'=> $this->faker->numberBetween(1,40),
            'title' => $this->faker->sentence,
            'room_id' => $this->faker->numberBetween(1,10),
            'building_id' => $this->faker->numberBetween(1,5),
            'body' => $this->faker->paragraph,
            'picture_path' => 'illustration-1.png',
            'published_at' => $this->faker->date(),
        ];
    }
}

