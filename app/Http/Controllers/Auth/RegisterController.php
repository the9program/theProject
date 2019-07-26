<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Personal\RegisterRequest;
use App\Repository\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {

        $this->middleware('guest');

    }

    protected function create(array $data)
    {

        $repository = new UserRepository();

        return $repository->create($data);

    }

    public function showRegistrationForm()
    {

        return view('auth.login');

    }

    public function register(RegisterRequest $request)
    {

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());

    }
}
