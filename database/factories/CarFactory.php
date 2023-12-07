<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->word,
            'model' => $this->faker->word,
            'plate_number' => $this->faker->lexify('??') . $this->faker->numerify('###') . $this->faker->lexify('??'),
            'rental_rate_per_day' => $this->faker->numberBetween(30000, 100000),
            'available' => $this->faker->boolean
        ];
    }
}
