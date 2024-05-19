<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Driver;
use App\Models\JadwalPickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwaPickUpController extends Controller
{
    public function index()
    {
        $jadwalPenjemputan = JadwalPickup::with('Area')->get();

        return view('jadwalPenjemputan.index',compact('jadwalPenjemputan'));
    }

    public function create()
    {
        $driver = Driver::all();
        $area = Area::all();
        return view('jadwalPenjemputan.create', compact('driver', 'area'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_jadwal' => 'required',
            'tanggal' => 'required',
            'id_driver' => 'required',
            'id_area' => 'required',
        ]);

        JadwalPickup::create([
            'kode_jadwal' => $request->kode_jadwal,
            'tanggal' => $request->tanggal,
            'id_driver' => $request->id_driver,
            'id_area' => $request->id_area,
        ]);

        return redirect()->route('jadwalPickUp.index');

    }

    public function show($id) 
    {
        $jadwalPenjemputan = JadwalPickup::findOrFail($id)->load('Area', 'Driver');

        return view('jadwalPenjemputan.detail', compact('jadwalPenjemputan'));

    }
    public function edit($id) 
    {
        $driver = Driver::all();
        $area = Area::all();
        $jadwalPenjemputan = JadwalPickup::findOrFail($id);

        return view('jadwalPenjemputan.edit', compact('jadwalPenjemputan', 'area', 'driver'));

    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jadwal' => 'required',
            'tanggal' => 'required',
            'id_driver' => 'required',
            'id_area' => 'required',
        ]);
    
        $jadwalPenjemputan = JadwalPickup::findOrFail($id);
    
        $jadwalPenjemputan->kode_jadwal = $request->kode_jadwal;
        $jadwalPenjemputan->tanggal = $request->tanggal;
        $jadwalPenjemputan->id_driver = $request->id_driver;
        $jadwalPenjemputan->id_area = $request->id_area;

        $jadwalPenjemputan->save();
    
        return redirect()->route('jadwalPickUp.index');
    }

    public function destroy($id)
    {
        $jadwalPickUp = JadwalPickup::findOrFail($id);
        $jadwalPickUp->delete();

        return redirect()->route('jadwalPickUp.index');
    }
}