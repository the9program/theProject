<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    public function run()
    {
        $categories = [
            'administrator',
            'ceo',
            'manager',
            'moderator',
            'doctor',
            'assistant'
        ];

        foreach ($categories as $category) {

            Category::create([
                'category'      => $category
            ]);

        }
    }

}
