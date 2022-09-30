<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => $this->faker->numberBetween(1,10),
            'module_id' => Module::factory()->create(),
            'building_id' => $this->faker->numberBetween(1,5),
        ];
    }
}

