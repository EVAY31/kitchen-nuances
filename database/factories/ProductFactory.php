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
            'title' => $this->faker->word,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(500, 500),
            'description' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->randomFloat(2, 3000, 30000),
            'product_id' => Category::factory(),
            'brand_id' => Brand::factory(),

        ];
    }
}
