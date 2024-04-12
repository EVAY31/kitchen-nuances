<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Сливки',
                'slug' => 'slivki',
                'image' => 'cream.jpg',
                'description' => 'Сливки 10%',
                'characteristics' => Lorem::text(20),
                'price' => '100.99',
                'category_id' => 1,
                'brand_id' => 1
            ],
            [
                'title' => 'Творог',
                'slug' => 'tvorog',
                'image' => 'cottage_cheese.jpg',
                'description' => 'Творог мягкий 1.5%',
                'characteristics' => Lorem::text(20),
                'price' => '100.99',
                'category_id' => 2,
                'brand_id' => 2
            ],
        ];

        foreach ($products as $product) {
            Product::factory()->create($product);
        }
    }
}
