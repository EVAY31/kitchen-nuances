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
                'slug' => 'tefal',
            ],
            [
                'title' => 'Polaris',
                'slug' => 'polaris',
            ],
            [
                'title' => 'Vitek',
                'slug' => 'vitek',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::factory()->create($brand);
        }
    }
}
