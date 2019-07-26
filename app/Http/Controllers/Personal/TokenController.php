<?php

namespace App\Http\Controllers\Personal;

use App\Category;
use App\Http\Requests\Personal\TokenEmailRequest;
use App\Http\Requests\Personal\TokenRequest;
use App\Notifications\Personal\TokenNotification;
use App\Repository\TokenRepository;
use App\Repository\UserRepository;
use App\Token;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')
            ->except(['edit', 'update']);

        $this->middleware('guest')
            ->only(['edit', 'update']);

    }

    public function index(Token $token)
    {

        if (auth()->user()->can('token', $token)) {

            return view('real.token.index', [
                'tokens' => Token::all()
            ]);

        }

        return abort(404);

    }

    public function create(Token $token)
    {

        if (auth()->user()->can('token', $token)) {

            return view('real.token.create', [
                'categories' => Category::where('id', '!=', 1)->get()
            ]);

        }

        return abort(404);

    }

    public function store(TokenEmailRequest $request, TokenRepository $repository)
    {

        if (auth()->user()->can('token', Token::class)) {

            if ($request->email == auth()->user()->email) {

                return back()->withErrors(['email' => __('personal/token.self_error')])->withInput();

            }

            $token = $repository->create($request->email,$request->category);

            $token->notify(new TokenNotification($token));

            session()->flash('success', __('personal/token.created'));

            return redirect()->route('token.index');

        }

        return abort(403);

    }

    public function edit(Token $token)
    {

        return view('real.token.edit', compact('token'));

    }

    public function update(TokenRequest $request, Token $token, UserRepository $repository)
    {

        $user = $repository->create($request->all(), $token->category_id);

        Auth::guard()->login($user);

        $token->delete();

        return redirect()->route('home');

    }

    public function destroy(Token $token)
    {

        if (auth()->user()->can('token',$token)) {

            $token->delete();

            session()->flash('success', __('personal/token.deleted'));

            return redirect()->route('token.index');

        }

        return abort(403);

    }
}
