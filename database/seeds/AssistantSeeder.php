<?php

use Illuminate\Database\Seeder;

class AssistantSeeder extends Seeder
{

    public function run()
    {
        // create user
        // join this user on doctor
        $repository = new \App\Repository\UserRepository();

        $user = $repository->create([
            'email'         => "assistant@ly.ly",
            'password'      => '12345678',
            'last_name'     => 'lakhsadi',
            'first_name'    => 'yasser',
            'gender'        => 1,
            'birth'         => \Carbon\Carbon::parse('1987-07-20')->format('Y-m-d'),
            'mobile'        => "0657834565",
            'default'       => true,
        ],6);
        $user->form()->create([
            'last_name'     => 'first',
            'first_name'    => 'last',
            'gender'        => 0,
            'birth'         => '1987-7-02',
            'creator_id'    => 1,
            'mobile'        => '0657834565'
        ]);
        auth()->setUser(\App\User::find(2));

        auth()->user()->doctor->joint->update([
            'assistant_id'  => $user->id
        ]);
    }
}
