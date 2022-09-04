<?php

namespace Database\Factories;

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
            'bezeichnung' => $this->faker->userName(),
            'room' => $this->faker->word(),
            'professor' => $this->faker->lastName(),
            'studiengang' => $this->faker->word(),
            'uhrzeit' => $this->faker->dateTime(),
        ];
    }
}
