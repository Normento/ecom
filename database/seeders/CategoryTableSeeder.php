<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesDetails = [
           [ 'id' => 1,
            'parent_id' => 0,
            'section_id' => 1,
            'category_name' => 'Montres',
            'category_image' => '',
            'category_discount' => 0,
            'description' => '',
            'url' => 'montres',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
            'status' => 1],

            [
                'id' => 2,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Femmes',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'femmes',
                'meta_title' => '',
                'meta_keywords' => '',
                'meta_description' => '',
                'status' => 1
            ],

            [
                'id' => 3,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Enfants',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'enfants',
                'meta_title' => '',
                'meta_keywords' => '',
                'meta_description' => '',
                'status' => 1
            ]

        ];
        Category::insert($categoriesDetails);
    }
}
