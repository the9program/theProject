<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    public function run()
    {
        $languages = [
            'arab', 'french', 'english', 'spanish',
            'italian', 'russian', 'chinese'
        ];

        foreach ($languages as $language) {

            Language::create([

                'language'  => $language

            ]);

        }
    }

}
