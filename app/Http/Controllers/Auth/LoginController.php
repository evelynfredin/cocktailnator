<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('error', 'Email and/or password are incorrect.');
        }

        $request->session()->regenerate();

        return redirect('/');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $authUser = Socialite::driver($provider)->user();

        $user = User::firstOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $authUser->getId(),
            ],
            [
                'email' => $authUser->getEmail(),
                'name' => $authUser->getName(),
            ]
        );

        Auth::login($user, false);

        return redirect('/');
    }
}
