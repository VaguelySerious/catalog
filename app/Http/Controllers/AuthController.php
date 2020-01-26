<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
public function login(Request $request)
    {
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|min:3'
        );

        $this->validate(request(), $rules);

        $userdata = array(
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        );

        $success = auth()->attempt($userdata);
        if ($success) {
            return redirect('/');
        } else {
            return redirect('/login')->withErrors(['general' => 'Email and password do not match']);
        }
    }

    public function register(Request $request)
    {
        $user = \App\User::where(['email' => $request->input('email')])->first();
        if ($user) {
            return redirect('/register')->withErrors(['email' => 'Email already in use']);
        }

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);

        $userdata = array(
            'email'     => $request->input('email'),
            'name'     => $request->input('name'),
            'password'  => $request->input('password')
        );

        $user = \App\User::create($userdata);

        auth()->login($user);

        return redirect()->to('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
