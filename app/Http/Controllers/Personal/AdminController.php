<?php

namespace App\Http\Controllers\Personal;

use App\Token;
use App\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index()
    {

        $this->authorize('admin',Token::class);

        $admins = User::where('category_id',2)
            ->orWhere('category_id',3)
            ->orWhere('category_id',4)
            ->with(['real.addresses','real.phones'])
            ->get();

        return view('admin.index',compact('admins'));

    }

    public function show(User $admin)
    {

        $this->authorize('admin',Token::class);

        return view('admin.show',compact('admin'));

    }

}
