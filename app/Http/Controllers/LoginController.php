<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
    public function login_page(){
        return view('login.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if ( Auth::attempt($credentials) ){
            return redirect()->intended('home');
        } else {
            return redirect()->intended('login');
        }
    }

    public function register_page(){
        return view('login.register');
    }
    
    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => 'required',
            'confirm-password' => 'required',
            'register-type' => ['required', 'numeric']
        ]);

        $params = $request->only('name', 'email', 'password', 'confirm-password', 'register-type');

        if( $params['password'] !== $params['confirm-password'] ){
            return redirect()->route('register')->with('password-unmatch', 'The two passwords doesn\'t match ');
        }

        $user = new User;

        $user->name = $params['name'];
        $user->user_type = $params['register-type'];
        $user->password = Hash::make($params['password']);
        $user->email = $params['email'];
        $user->timestamps = false;
        $user->save();

        return redirect()->route('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('login');
    }
}
