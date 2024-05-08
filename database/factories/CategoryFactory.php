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
        return [
            'title' => $this->faker->randomElement(['Чайники','Тостеры','Вафельницы','Миксеры','Блендеры','Соковыжималки']),
            'slug' =>$this->faker->randomElement(['teapots','toasters','waffleIrons','mixers','blenders','juicers']),
            'image' => $this->faker->imageUrl(['teapots.jpg', 'toasters.jpg', 'waffleIrons.jpg','mixers.jpg','blenders.jpg', 'juicers.jpg']),
        ];
    }
}
