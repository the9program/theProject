<?php
namespace App\Repository;


use App\Address;
use App\Doctor;
use App\Http\Requests\Directory\DoctorRequest;
use App\Http\Requests\Presence\DoctorRegisterRequest;

class DoctorRepository
{
    public function create(DoctorRequest $request)
    {
        $address = Address::create($request->all([
            'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id'
        ]));

        $doctor = $address->doctor()->create([
            'last_name'         => $request->last_name,
            'first_name'        => $request->first_name,
            'phone'             => $request->mobile,
            'specialty_id'      => $request->specialty,
            'creator_id'        => auth()->id(),
        ]);

        $joint = $doctor->joint()->create();

        $joint->search()->create([
            'full_name'         => $doctor->full_name,
            'specialty_id'      => $doctor->specialty_id,
            'city_id'           => $request->city_id
        ]);

        return $doctor;

    }

    public function register(DoctorRegisterRequest $request, Doctor $doctor)
    {
        $doctor->user->update([
            'password'  => bcrypt($request->password)
        ]);

        $doctor->user->real()->create([
            'last_name'     => $doctor->last_name,
            'first_name'    => $doctor->first_name,
            'gender'        => $request->gender,
            'birth'         => $request->birth,
        ]);

        $doctor->user->form()->create([
            'last_name'     => $doctor->last_name,
            'first_name'    => $doctor->first_name,
            'gender'        => $request->gender,
            'birth'         => $request->birth,
            'mobile'        => $request->mobile,
            'creator_id'    => $doctor->user->creator_id
        ]);
    }
}