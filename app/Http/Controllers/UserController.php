<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id){

        $user = User::findOrFail($id);

        return view('admin.users.profile', compact('user'));
    }

    public function update($id){

        $input = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);

        if(request('avatar')){
            $input['avatar'] = request('avatar')->store('images');
            $user->avatar = $input['avatar'];
        }

        $user->username = $input['username'];
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];

        auth()->user()->save($user);

        session()->flash('user-profile-updated-message', 'User Profile was updated.');

        return redirect()->route('user.profile.update');

    }
}
