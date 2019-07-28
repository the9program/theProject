<?php

namespace App\Http\Controllers\Directory;

use App\Http\Controllers\Controller;
use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

        return view('directory.search',[
            'specialties'   => $this->vars()['specialties'],
            'cities'        => $this->vars()['cities']
        ]);
    }


    public function search(Request $request)
    {

        return view('directory.search',[
            'searches'      => $this->result($request),
            'specialties'   => $this->vars()['specialties'],
            'cities'        => $this->vars()['cities']
        ]);

    }

    private function vars()
    {

        return [
            'specialties'   => Search::with(['specialty'])
                ->distinct()
                ->get(),
            'cities'        => Search::with(['city'])->distinct()
                ->get()
        ];

    }

    private function where($request)
    {

        $where = [];

        if($request->doctor) {

            $where[] = ['full_name','like', '%' . $request->doctor . '%'];

        }

        if($request->specialty) {

            $where[] = ['specialty_id', $request->specialty];

        }

        if($request->city) {

            $where[] = ['city_id', $request->city];

        }

        return $where;

    }

    private function result($request)
    {

        return Search::where($this->where($request))
            ->with(['joint.doctor','city','specialty'])
            ->inRandomOrder()
            ->take(12)->get();

    }
}
