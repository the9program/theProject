<?php

namespace App\Http\Controllers\Personal;

use App\Http\Requests\Personal\MobileRequest;
use App\Phone;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{

    public function index()
    {

        return view('real.mobile.index', [
            'mobiles' => auth()->user()->real->phones()->get()
        ]);

    }

    public function create()
    {

        return view('real.mobile.create');

    }

    public function store(MobileRequest $request)
    {

        if ($request->default) {

            foreach (auth()->user()->real->phones as $phone) {

                $phone->update(['default' => false]);

            }

            auth()->user()->real->phones()->create([
                'phone' => $request->mobile,
                'default' => true
            ]);

            session()->flash('success', __('personal/mobile.created_default'));

        } else {

            auth()->user()->real->phones()->create([
                'phone' => $request->mobile,
                'default' => false
            ]);

            session()->flash('success', __('personal/mobile.created'));

        }

        return redirect()->route('phone.index');
    }

    public function edit(Phone $phone)
    {

        return view('real.mobile.edit', compact('phone'));

    }

    public function update(MobileRequest $request, Phone $phone)
    {

        if ($request->default) {

            foreach (auth()->user()->real->phones as $mobile) {

                $mobile->update(['default' => false]);

            }

            session()->flash('success', __('personal/mobile.updated_default'));


        } else {

            session()->flash('success', __('personal/mobile.updated'));

        }

        $phone->update([
            'phone' => $request->mobile,
            'default'   => true
        ]);

        return redirect()->route('phone.index');

    }

    public function destroy(Phone $phone)
    {

        if ($phone->default) {

            session()->flash('danger', __('personal/mobile.not_deleted'));

        } else {

            $phone->delete();

            session()->flash('success', __('personal/mobile.deleted'));

        }

        return redirect()->route('phone.index');

    }
}
