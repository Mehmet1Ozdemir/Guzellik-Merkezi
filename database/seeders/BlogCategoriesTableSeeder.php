<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ana kategorileri oluştur
        $categories = [
            [
                'name' => 'Kategori 1',
                'slug_name' => 'kategori-1',
            ],
            [
                'name' => 'Kategori 2',
                'slug_name' => 'kategori-2',
            ],
            [
                'name' => 'Kategori 3',
                'slug_name' => 'kategori-3',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('blog_categories')->insert([
                'name' => $category['name'],
                'slug_name' => $category['slug_name'],
            ]);
        }

    }
}
