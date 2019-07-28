<?php

namespace App\Http\Controllers\Presence;


use App\Http\Controllers\Controller;
use App\Http\Requests\Presence\AssistantRequest;
use App\User;

class AssistantController extends Controller
{

    public function create()
    {

        return view('presence.assistant.create');
    }

    public function store(AssistantRequest $request)
    {

        $user = User::where('email',$request->email)->first();

        $request->request->add(['creator_id' => auth()->id()]);

        $user->form()->create($request->all([
            'last_name', 'first_name', 'gender', 'birth', 'creator_id', 'mobile'
        ]));

        auth()->user()->doctor->joint->update([
            'assistant_id'  => $user->id
        ]);

        $user->update(['category_id' => 6]);

        session()->flash('success','un compte assistant  bien été joint');

        return back();
    }
}