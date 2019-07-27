<?php

namespace App\Http\Controllers\Doctor;

use App\Address;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Directory\DoctorRequest;

class DoctorController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')
            ->except(['show']);

    }

    public function index()
    {

        $this->authorize('index',Doctor::class);

        $doctors = Doctor::all();

        return view('doctor.index',compact('doctors'));

    }

    public function create()
    {

        $this->authorize('create',Doctor::class);

        return view('doctor.create',compact('specialties'));

    }

    public function store(DoctorRequest $request)
    {

        $this->authorize('create',Doctor::class);

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


        return redirect()->route('doctor.show',compact('doctor'));

    }

    public function show(Doctor $doctor)
    {

        return view('doctor.show', compact('doctor'));

    }

    public function edit(Doctor $doctor)
    {

        $this->authorize('update',Doctor::class);

        return view('doctor.edit', compact('doctor'));

    }

    public function update(DoctorRequest $request, Doctor $doctor)
    {

        $this->authorize('update',Doctor::class);

        $doctor->address()->update($request->all(['address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id', 'real_id']));

        $doctor->update([
            'last_name'         => $request->last_name,
            'first_name'        => $request->first_name,
            'phone'             => $request->mobile,
            'specialty_id'      => $request->specialty,
        ]);

        return redirect()->route('doctor.show', compact('doctor'));

    }

    public function destroy(Doctor $doctor)
    {

        $this->authorize('update',Doctor::class);

        $doctor->delete();

        return redirect()->route('doctor.index');

    }

}
