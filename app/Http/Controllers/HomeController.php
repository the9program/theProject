<?php

namespace App\Http\Controllers;


use App\Availability;
use App\Doctor;
use App\Joint;
use App\Search;
use App\Specialty;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        /*
        $availabilities = Availability::all();
        $av = [];
        foreach ($availabilities as $availability) {

            if (!in_array(Carbon::parse($availability->from)->format('Y-m-d'),$av)) {

                $av[] = Carbon::parse($availability->from)->format('Y-m-d');

            }

        }

        dd($av);
*/
        return view('welcome',[
            'users'         => User::all()->count(),
            'doctors'       => Doctor::all()->count(),
            'services'      => Specialty::all()->count(),
            'joints'        => Joint::all()->count(),
            'specialties'   => Search::with(['specialty'])
                ->distinct()
                ->get(),
            'cities'        => Search::with(['city'])->distinct()
                ->get()
        ]);
    }
}
