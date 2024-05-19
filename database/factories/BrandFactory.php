<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['Tefal','Polaris','Vitek']),
            'slug' =>$this->faker->randomElement(['tefal','polaris','vitek']),
            'image' => $this->faker->imageUrl(['tefal.jpg', 'polaris.jpg', 'vitek.jpg']),
        ];
    }
}
