<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{


    public function run()
    {
        $repository = new \App\Repository\UserRepository();

        $repository->create([
            'email'         => "email@email.com",
            'password'      => bcrypt('12345678'),
            'last_name'     => 'lakhsadi',
            'first_name'    => 'yasser',
            'gender'        => 1,
            'birth'         => \Carbon\Carbon::parse('1987-07-20')->format('Y-m-d'),
            'mobile'        => "0657834565",
            'default'       => true,
            ],1);
    }
}
