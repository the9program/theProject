<?php

use Illuminate\Database\Seeder;

class RegisterDoctorSeeder extends Seeder
{

    public function run()
    {
        $doctor = \App\Doctor::first();
        $user = $doctor->user()->create([
            'email'             => 'doctor@ly.ly',
            'password'          => bcrypt('12345678'),
            'remember_token'    => md5(sha1(rand())),
            'category_id'       => 5,
            'creator_id'        => auth()->id()
        ]);
        $doctor->update([
            'user_id' => $user->id,
            'premium'   => true
        ]);

        $doctor->user->real()->create([
            'last_name'     => $doctor->last_name,
            'first_name'    => $doctor->first_name,
            'gender'        => 0,
            'birth'         => '1987-07-20',
        ]);

        $doctor->user->form()->create([
            'last_name'     => $doctor->last_name,
            'first_name'    => $doctor->first_name,
            'gender'        => 0,
            'birth'         => '1987-07-20',
            'mobile'        => '0657834565',
            'creator_id'    => $doctor->user->creator_id
        ]);
    }
}
