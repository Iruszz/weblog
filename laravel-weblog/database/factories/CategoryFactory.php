<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tailwindColors = [
            'red-50', 'blue-50', 'green-50', 'yellow-50', 'purple-50',
            'pink-50', 'orange-50', 'cyan-50','rose-50', 'gray-50',
        ];

        return [
            'name' => $this->faker->word(),
            'color' => $this->faker->randomElement($tailwindColors),
        ];
    }
}
