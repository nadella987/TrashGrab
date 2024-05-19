<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
		return view('login');
	}

    public function loginAction(Request $request) 
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return redirect()->route('beranda');
    } else {
        return redirect()->back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }
    }

    public function register(){
		return view('register');
	}

public function registerSave(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'name' => 'required',
        'password' => ['required', 'string', 'confirmed', 'min:6'],
        'username' => 'required',
        'telp' => 'required',
        'alamat' => 'required',
        'role' => 'required',
    ]);

    User::create([
        'email' => $request->email,
        'name' => $request->name,
        'password' => Hash::make($request->password),
        'username' => $request->username,
        'telp' => $request->telp,
        'alamat' =>$request->alamat,
        'role' =>$request->role,
    ]);

    return redirect()->route('login');
}

public function actionlogout()
{
    Auth::logout();
    return redirect()->route('login');
}

}
