<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\JadwalPickup;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('User', 'JadwalPickup')->get();
        return view('transaksi.index',compact('transaksi'));
    }

    public function create()
    {
        $jadwal = JadwalPickup::all();
        $user = User::where('role',  'member')->get();
        return view('transaksi.create', compact('user', 'jadwal'));
    }

    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_jadwal' => 'required',
            'tanggal_transaksi' => 'required|date',
            'alamat_jemput' => 'required',
            'status' => 'required',
        ]);

        $transaksi = Transaksi::create($validatedData);

        return redirect()->route('sampah.create', ['transaksi_id' => $transaksi->id]);
    }

    public function show($id) 
    {
        $transaksi = Transaksi::findOrFail($id)->load('JadwalPickup', 'User');
        $detailTransaksi = DetailTransaksi::where('id_transaksi', $id)->with('Sampah')->get();
        

        return view('transaksi.detail', compact('transaksi', 'detailTransaksi'));

    }
    public function edit($id) 
    {
        $jadwal = JadwalPickup::all();
        $user = User::where('role',  'member')->get();
        $transaksi = Transaksi::findOrFail($id);


        return view('transaksi.edit', compact('transaksi', 'user', 'jadwal'));

    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required',
            'id_jadwal' => 'required',
            'tanggal_transaksi' => 'required',
            'alamat_jemput' => 'required',
            'status' => 'required',
        ]);
    
        $transaksi = transaksi::findOrFail($id);
    
        $transaksi->id_user = $request->id_user;
        $transaksi->id_jadwal = $request->id_jadwal;
        $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
        $transaksi->alamat_jemput = $request->alamat_jemput;
        $transaksi->status =$request->status;

        $transaksi->save();
    
        return redirect()->route('transaksi.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
    
        $transaksi = Transaksi::findOrFail($id);
    
        $transaksi->status = $request->status;

        $transaksi->save();
    
        return redirect()->route('transaksi.index');
    }
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index');
    }
}
