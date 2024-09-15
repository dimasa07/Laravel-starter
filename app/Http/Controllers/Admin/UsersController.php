<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notification\Toast;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '!=', $request->user()->id)->paginate(10)->onEachSide(1);
        
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {

    }

    public function create(Request $request)
    {
        
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'job_title' => [],
            'birthday' => [],
            'address' => [],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $checkEmail = User::where('email', $request->email)->first();
        if($checkEmail){
            return back()->withErrors([
                'email' => 'Email is already exists'
            ]);
        }

        $user = new User();
        $user->fill($request->input());
        $user->save();

        return back()->with('toast', new Toast('User saved successfully', 'success'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'job_title' => [],
            'birthday' => [],
            'address' => [],
        ]);

        $user->fill($request->input());
        $user->update();

        return back()->with('toast', new Toast('User updated successfully', 'success'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('toast', new Toast('User deleted successfully', 'success'));
    }
}
