<?php

namespace App\Http\Controllers\Presence;

use App\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function index()
    {

        return view('presence.experience.index',[
            'experiences'   => auth()->user()
                ->doctor
                ->experiences()
                ->where('study',0)
                ->get()
        ]);

    }

    public function create()
    {

        return view('presence.experience.create');

    }

    public function store(Request $request, Experience $experience)
    {

        $request->request->add([
            'study' => false,
            'doctor_id' => auth()->user()->doctor->id
        ]);

        $experience->create($request->all([
            'study', 'title', 'establishment', 'from', 'to', 'doctor_id'
        ]));

        session()->flash('success', __('presence/experience.created'));
        if(is_null($request->to)){

            return redirect()->route('experience.index');

        }

        return redirect()->route('experience.create');

    }

    public function edit(Experience $experience)
    {

        return view('presence.experience.edit',compact('experience'));

    }

    public function update(Request $request, Experience $experience)
    {

        $experience->update($request->all([
            'title', 'establishment', 'from', 'to'
        ]));

        session()->flash('success', __('presence/experience.updated'));

        return redirect()->route('experience.index');

    }

    public function destroy(Experience $experience)
    {

        $experience->delete();

        session()->flash('success', __('presence/experience.deleted'));

        return redirect()->route('experience.index');

    }
}
