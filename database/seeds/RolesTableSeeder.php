<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {

        $roles = [
            'potential_doctor_list', 'potential_doctor_create', 'potential_doctor_update',
            'presence_create', 'doctor_delete', 'premium', 'admin',
        ];

        foreach ($roles as $role) {

            $role = Role::create([
                'role'  => $role
            ]);

            if($role === 'doctor_delete'){

                $role->categories()->attach([1]);

            }

            elseif($role === 'admin'){

                $role->categories()->attach([1,2,3]);

            }

            else{

                $role->categories()->attach([1,2,3,4]);

            }

        }
    }
}
