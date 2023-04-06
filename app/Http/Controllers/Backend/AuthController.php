<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function showRegistrationForm(): View
    {
        return view('backend.auth.register');
    }
    public function register(RegisterRequest $request): RedirectResponse
    {
        User::create($request->all());

        return to_route('backend.login')->withSuccess('qeydiyyat etdiniz');;

    }
    public function loginView(): View
    {
        return view('backend.auth.login');
    }
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->safe()->only(['email', 'password']);

        if (auth()->attempt($credentials)) {
            return to_route('backend.dashboard')->withSuccess('giriş etdiniz');
        }

        return back()->withWarning('Email və ya Şifrə yalnışdır');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return to_route('backend.login.view');
    }
}
