<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
 public function index()
 {
    $user = User::get();

    return view('user.index',compact('user'));
 }

 public function create()
 {
    return view('user.create');
 }

 public function store(Request $request)
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

    return redirect()->route('user.index');

 }

 public function show($id) 
 {
    $user = User::findOrFail($id);

    return view('user.detail', compact('user'));

 }
 public function edit($id) 
 {
    $user = User::findOrFail($id);

    return view('user.edit', compact('user'));

 }

 
 public function update(Request $request, $id)
 {
     $request->validate([
        'email' => 'required',
        'name' => 'required',
        'username' => 'required',
        'telp' => 'required',
        'alamat' => 'required',
        'role' => 'required',
     ]);
 
     $user = User::findOrFail($id);
 
     $user->email = $request->email;
     $user->name = $request->name;
     $user->username = $request->username;
     $user->telp = $request->telp;
     $user->alamat =$request->alamat;
     $user->role =$request->role;

     $user->save();
 
     return redirect()->route('user.index');
 }

 public function destroy($id)
 {
     $user = User::findOrFail($id);
     $user->delete();

     return redirect()->route('user.index');
 }

 public function showProfile($id)
 {
     $user = User::find($id); 
     return view('user.profile', ['user' => $user]);
 }

 public function editPassword($id) 
 {
    $user = User::findOrFail($id);

    return view('user.editProfile', compact('user'));

 }

 
 public function updatePassword(Request $request, $id)
 {
   $request->validate([
      'password' => ['required', 'string', 'confirmed', 'min:6'],
  ]);

      $user = User::find($id);
      $user->password = Hash::make($request->password);
      $user->save();

 
     return redirect()->route('user.showProfile', $user->id);
 }
}
