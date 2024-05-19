<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index()
    {
        $driver = Driver::get();

        return view('driver.index',compact('driver'));
    }

    public function create()
    {
        return view('driver.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pegawai' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        Driver::create([
            'nama_pegawai' => $request->nama_pegawai,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' =>$request->alamat,
        ]);

        return redirect()->route('driver.index');

    }

    public function show($id) 
    {
        $driver = Driver::findOrFail($id);

        return view('driver.detail', compact('driver'));

    }
    public function edit($id) 
    {
        $driver = Driver::findOrFail($id);

        return view('driver.edit', compact('driver'));

    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
    
        $driver = Driver::findOrFail($id);
    
        $driver->email = $request->email;
        $driver->nama_pegawai = $request->nama_pegawai;
        $driver->jenis_kelamin = $request->jenis_kelamin;
        $driver->no_telp = $request->no_telp;
        $driver->alamat =$request->alamat;

        $driver->save();
    
        return redirect()->route('driver.index');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('driver.index');
    }
}
