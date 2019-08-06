<?php

namespace App\Http\Controllers\Presence;


use App\Http\Controllers\Controller;
use App\Http\Requests\Presence\AssistantRequest;
use App\User;

class AssistantController extends Controller
{

    public function create()
    {

        if (!auth()->user()->doctor->joint->assistant) {

            return view('presence.assistant.create');

        }

        else {

            return redirect()->route('assistant.show', [

                'assistant' => auth()->user()->doctor->joint->assistant_id

            ]);

        }

    }

    public function store(AssistantRequest $request)
    {

        if (!auth()->user()->doctor->joint->assistant_id) {

            $user = User::where('email', $request->email)->first();

            $request->request->add(['creator_id' => auth()->id()]);

            if (!$user->form) {

                $user->form()->create($request->all([
                    'last_name', 'first_name', 'gender', 'birth', 'creator_id', 'mobile'
                ]));

            }

            auth()->user()->doctor->joint->update([
                'assistant_id' => $user->id
            ]);

            $user->update(['category_id' => 6]);

            session()->flash('success', 'un compte assistant  bien été joint');

        }
        else {

            session()->flash('warning', 'Vous avez déja un(e) assistant(e)');

        }

        return redirect()->route('assistant.show', [
            'assistant' => auth()->user()->doctor->joint->assistant_id
        ]);

    }

    public function show(User $assistant)
    {

        if (auth()->user()->doctor->joint->assistant_id === $assistant->id) {

            return view('presence.assistant.show', compact('assistant'));

        }

        return abort(404);

    }

    public function destroy(User $assistant)
    {

        if (auth()->user()->doctor->joint->assistant_id === $assistant->id) {

            $assistant->update([
                'category_id' => null
            ]);

            auth()->user()->doctor->joint->update([
                'assistant_id' => null
            ]);

            session()->flash('success', 'Compte assistant détaché');

            return redirect()->route('assistant.create');

        }

        return abort(404);

    }

}