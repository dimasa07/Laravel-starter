<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notification\Toast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class EmailPasswordController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        return view('profile.email-password', compact('user'));
    }

    public function updateEmail(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email']
        ]);

        $user = $request->user();
        $checkEmail = User::where([
            ['id', '!=', $user->id],
            ['email', '=', $request->email]
        ])->first();
        if($checkEmail){
            return back()->withErrors([
                'email' => 'Email is already exists'
            ]);
        }

        $user->email = $request->email;
        $user->save();

        return back()->with('toast', new Toast('Email updated successfully', 'success'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:8', 'same:password_confirmation'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('toast', new Toast('Password successfully updated', 'success'));

    }
}
