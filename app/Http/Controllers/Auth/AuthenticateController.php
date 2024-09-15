<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notification\Toast;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthenticateController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials, $request->input('remember_me'))){
            $request->session()->regenerate();

            return redirect()->intended(route('home', absolute: false))->with('toast', new Toast('Logged in successfully', 'success'));
        }

        return back()->withErrors([
            'email' => trans('auth.failed')
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('toast', new Toast('Logged out successfully', 'success'));
    }
}
