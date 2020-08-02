<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

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
            'password_confirmation' => ['required'],
        ]);

        $user = User::findOrFail($id);

        if(request('avatar')){
            $input['avatar'] = request('avatar')->store('images');
        }

        $user->update($input);

        session()->flash('user-profile-updated-message', 'Your profile was updated.');

        return back();
    }
}
