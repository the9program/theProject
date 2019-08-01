<?php

namespace App\Http\Controllers\Appointment;

use App\Availability;
use App\Http\Requests\Appointment\AvailabilityRequest;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AvailabilityController extends Controller
{

    public function index()
    {

        $this->authorize('availability',Availability::class);

        if (auth()->user()->category_id === 6){

            $availabilities = auth()->user()->joint->availabilities;

        }

        else{

            $availabilities = auth()->user()->doctor->joint->availabilities;

        }

        $availabilities = $this->tasks($availabilities);

        return view('appointment.availability.index',compact('availabilities'));

    }

    private function tasks($availabilities)
    {

        $calendar = '';

        foreach ($availabilities as $available){

            $calendar .= "{";

            if(!$available->available){

                $calendar .= "color: '#a94442',";

            }

            $calendar .= "url: '". route('availability.show',compact('available')) . "',";

            $calendar .= "start: '" . Carbon::parse($available->from)->format('Y-m-d') . "T". Carbon::parse($available->from)->format('H:i:s') ."'";

            $calendar .= "},";

        }

        return $calendar;

    }

    public function show(Availability $availability)
    {

        $this->authorize('availability',Availability::class);

        return view('appointment.availability.show',['appointments' => $availability->appointments]);

    }

    public function create()
    {

        $this->authorize('availability',Availability::class);

        return view('appointment.availability.create');

    }

    public function store(AvailabilityRequest $request)
    {
        $this->authorize('availability',Availability::class);
        $av = $this->availability($request,$this->joint()->id);
        if ($av){
            session()->flash('danger', 'not available');
            return back()->withErrors($request->all())->withInput();
        }
        $from = Carbon::parse($request->day . ' ' . $request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->day . ' ' . $request->to)->format('Y-m-d H:i:s');
        $joint = $this->joint();
        $availability = Availability::create([
            'from'          => $from,
            'to'            => $to,
            'user_id'       => auth()->id(),
            'joint_id'      => $joint->id,
            'available'     => true
        ]);
        $this->appointment($availability);
        return redirect()->route('availability.index');


    }

    private function appointment(Availability $availability)
    {
        $seance = $availability->from;
        while ($seance <= $availability->to){
            $availability->appointments()->create([
                'season' => $seance
            ]);

            $seance = Carbon::parse($seance)
                ->addMinutes(15)
                ->format('Y-m-d H:i:s');
        }
    }

    private function joint()
    {
        if($joint = auth()->user()->joint) {
            return $joint;
        }
        return auth()->user()->doctor->joint;
    }

    private function availability($request,$joint_id)
    {
        $from = Carbon::parse($request->day . ' ' . $request->from)->format('Y-m-d H:i:s');
        $to = Carbon::parse($request->day . ' ' . $request->to)->format('Y-m-d H:i:s');
        return Availability::where(function ($q) use ($request,$joint_id,$from,$to){
            $q->where([
                ['joint_id', $joint_id]
            ]);

            $q->where(function ($query)use ($request,$from,$to){

                $query->whereBetween('from',[$from,$to])

                    ->orWhere(function ($query) use ($request,$from,$to) {

                        $query->whereBetween('to',[$from,$to]);

                    })

                    ->orWhere([
                        ['from', '<=', $from],
                        ['to', '>=', $to]
                    ]);
            });
        })->first();
    }
}
