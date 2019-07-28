<?php

namespace App\Http\Controllers\Presence;

use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function create()
    {

        return view('presence.language.create',[
            'languages'     => Language::all()
        ]);
    }

    public function store(Request $request)
    {
        $langue = [];

        foreach ($request->language as $key => $language) {
            $langue[] = $key;
        }

        auth()->user()->doctor->languages()->sync($langue);

        session()->flash('success', 'vos languages sont indiquez avec succès');

        return redirect()->route('home');

    }
}
