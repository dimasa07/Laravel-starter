<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Notification\Toast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function detail(Request $request)
    {
        $user = $request->user();
        
        return view('profile.detail', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'job_title' => [],
            'birthday' => [],
            'address' => [],
            'avatar' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ]);

        $user = $request->user();
        $user->fill($request->input());

        if($request->avatar_removed){
            if($user->avatar){
                File::delete(public_path($user->avatar));
                $user->avatar = null;
            }
        }else if($request->avatar){
            $fileName = $request->user()->id . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatars'), $fileName);
            $user->avatar = 'avatars/' . $fileName;
        }

        $user->update();

        return back()->with('toast', new Toast('Profile updated successfully', 'success'));
    }
}
