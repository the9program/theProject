<?php

namespace App\Http\Controllers;


use App\Availability;
use App\Clinical;
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

        return view('welcome',[
            'users'         => User::all()->count(),
            'doctors'       => Doctor::all()->count(),
            'services'      => Specialty::all()->count(),
            'joints'        => Joint::all()->count(),
            'specialties'   => Search::with(['specialty'])
                ->distinct()
                ->get(),
            'cities'        => Search::with(['city'])->distinct()
                ->get(),
            'list_doctors'  => User::where('category_id',5)
                ->limit(5)
                ->with(['doctor'])
                ->orderBy('created_at', 'desc')
                ->get(),
            'list_clinics'  => Clinical::limit(5)
                ->orderBy('created_at', 'desc')
                ->with(['address','city'])
                ->get()
        ]);

    }
}
