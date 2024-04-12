<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
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
            'image' => $this->faker->randomElement(['cream.jpg', 'cottage_cheese.jpg']),
            'description' => $this->faker->randomElement(['Сливки 10%', 'Творог мягкий 1.5%']),
            'content' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->randomNumber(4),
            'quantity' => $this->faker->numberBetween(1, 100),
            'product_id' => Category::factory(),
            'brand_id' => Brand::factory(),
        ];
    }
}
