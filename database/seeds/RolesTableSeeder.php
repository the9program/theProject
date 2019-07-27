<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {

        $roles = [
            'potential_doctor_list', 'potential_doctor_create', 'potential_doctor_update'
        ];

        foreach ($roles as $role) {

            $role = Role::create([
                'role'  => $role
            ]);

            $role->categories()->attach([1,2,3,4]);

        }
    }
}
