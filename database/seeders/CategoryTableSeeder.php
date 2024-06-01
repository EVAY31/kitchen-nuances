<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Чайники',
                'image' => 'teapots.jpg',
                'slug' => 'teapots'
            ],
            [
                'title' => 'Тостеры',
                'image' => 'toasters.jpg',
                'slug' => 'toasters'
            ],
            [
                'title' => 'Миксеры',
                'image' => 'mixers.jpg',
                'slug' => 'mixers'
            ],
            [
                'title' => 'Блендеры',
                'image' => 'blenders.jpg',
                'slug' => 'blenders'

            ],
            [
                'title' => 'Соковыжималки',
                'image' => 'juicers.jpg',
                'slug' => 'juicers'
            ],
            [
                'title' => 'Вафельницы',
                'image' => 'waffleIrons.jpg',
                'slug' => 'waffleIrons'
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->create($category);
        }
    }
}
