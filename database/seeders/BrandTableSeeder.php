<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'title' => 'Tefal',
                'image' => 'tefal.jpg',
                'slug' => 'tefal'
            ],
            [
                'title' => 'Polaris',
                'image' =>'polaris.jpg',
                'slug' => 'polaris'
            ],
            [
                'title' => 'Vitek',
                'image' =>'vitek.jpg',
                'slug' => 'vitek'
            ],
        ];

        foreach ($brands as $brand) {
            Brand::factory()->create($brand);
        }
    }
}
