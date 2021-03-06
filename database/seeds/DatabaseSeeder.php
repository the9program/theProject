<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            LanguagesTableSeeder::class,
            CitiesTableSeeder::class,
            SpecialtiesTableSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            DoctorsSeeder::class,
            RegisterDoctorSeeder::class,
            AssistantSeeder::class
        ]);
    }
}
