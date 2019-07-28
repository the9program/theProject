<?php

use App\Http\Requests\Directory\DoctorRequest;
use App\Repository\DoctorRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DoctorsSeeder extends Seeder
{

    public function run()
    {

        $user = \App\User::find(1);
        auth()->setUser($user);
        for ($i = 0; $i < 51; $i++){

            $request = new DoctorRequest([
                'default'       => true,
                'last_name'     => Str::random(5),
                'first_name'    => Str::random(5),
                'gender'        => rand(0,1),
                'mobile'        => '0691983303',
                'specialty'     => rand(1,44),
                'address'       => Str::random(16),
                'build'         => rand(1,50),
                'floor'         => rand(1,50),
                'apt_nbr'       => rand(1,50),
                'zip'           => 20000,
                'city_id'       => rand(1,250),
                'creator_id'    => 1
            ]);

            $repository = new DoctorRepository();

            $repository->create($request);

        }


    }
}
