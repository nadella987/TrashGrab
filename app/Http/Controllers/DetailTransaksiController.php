<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\KatalogSampah;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailTransaksiController extends Controller
{
  
    public function create()
    {
        $transaksi = Transaksi::latest()->first();
        $sampah = KatalogSampah::all();
        return view('detailTransaksi.create', compact( 'sampah', 'transaksi'));
    }

    public function store(Request $request)
    {
        $id_transaksi = $request->id_transaksi; 
        $id_sampah = $request->id_sampah;
        $qty = $request->qty;
        $total = $request->total;

        for ($i = 0; $i < count($id_sampah); $i++) {
            if (!empty($id_sampah[$i]) && !empty($qty[$i])) {
                $detail_transaksi = new DetailTransaksi();
                $detail_transaksi->id_transaksi = $id_transaksi;
                $detail_transaksi->id_sampah = $id_sampah[$i];
                $detail_transaksi->qty = $qty[$i];
                $detail_transaksi->total =  $total[$i];
                $detail_transaksi->save();
            }
        }

        return redirect()->route('transaksi.index');

    }
    public function edit($id) 
    {
        $detail_transaksi = DetailTransaksi::findOrFail($id)->load('Sampah');
        $sampah = KatalogSampah::all();

        return view('detailTransaksi.edit', compact('detail_transaksi', 'sampah'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'qty' => 'required',
            'total' => 'required',
        ]);
    
        $detail_transaksi = DetailTransaksi::findOrFail($id);
    
        $detail_transaksi->id_transaksi = $request->id_transaksi;
        $detail_transaksi->qty = $request->qty;
        $detail_transaksi->total = $request->total;

        $detail_transaksi->save();
    
        return redirect()->route('transaksi.show', $detail_transaksi->id_transaksi);
    }

    public function destroy($id)
    {
        $detailTransaksi = DetailTransaksi::findOrFail($id);
        $detailTransaksi->delete();

        return redirect()->route('transaksi.show', $detailTransaksi->id_transaksi);
    }
}
