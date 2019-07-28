<?php

namespace App\Http\Controllers;


use App\Search;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome',[
            'specialties'   => Search::with(['specialty'])
                ->distinct()
                ->get(),
            'cities'        => Search::with(['city'])->distinct()
                ->get()
        ]);
    }
}
