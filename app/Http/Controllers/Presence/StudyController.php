<?php

namespace App\Http\Controllers\Presence;

use App\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{

    public function index()
    {

        return view('presence.study.index',[
            'studies'   => auth()->user()
                ->doctor
                ->experiences()
                ->where('study',1)
                ->get()
        ]);

    }

    public function create()
    {

        return view('presence.study.create');

    }

    public function store(Request $request, Experience $study)
    {

        $request->request->add([
            'study' => true,
            'doctor_id' => auth()->user()->doctor->id
        ]);

        $study->create($request->all([
            'study', 'title', 'establishment', 'from', 'to', 'doctor_id'
        ]));

        session()->flash('success', __('presence/study.created'));

        return redirect()->route('study.create');

    }

    public function edit(Experience $study)
    {

        return view('presence.study.edit',compact('study'));

    }

    public function update(Request $request, Experience $study)
    {

        $study->update($request->all([
            'title', 'establishment', 'from', 'to'
        ]));

        session()->flash('success', __('presence/study.updated'));

        return redirect()->route('study.index');

    }

    public function destroy(Experience $study)
    {

        $study->delete();

        session()->flash('success', __('presence/study.deleted'));

        return redirect()->route('study.index');

    }
}
