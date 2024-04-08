<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anchor>
 */
class AnchorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'url' => $this->faker->url(),
            'slug' => $this->faker->url(),
            'ttl' => $this->faker->numberBetween(1, 86400),
            'max_follows' => $this->faker->numberBetween(0, 99),
        ];
    }
}
