<?php

namespace App\Http\Controllers\Personal;

use App\Http\Requests\Personal\ParamsRequest;
use App\Http\Controllers\Controller;
use App\Repository\RealRepository;
use App\Repository\UserRepository;

class ParamsController extends Controller
{

    public function paramsForm()
    {

        return view('real.params');

    }

    public function params(ParamsRequest $request,UserRepository $userRepository, RealRepository $realRepository)
    {

        if(!is_null($request->avatar)) {

            $userRepository->updateAvatar($request->file('avatar'));

        }

        $realRepository->updateReal($request);

        session()->flash('success', __('personal/real.updated'));

        return back();
    }
}
