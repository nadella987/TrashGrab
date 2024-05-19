<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        $transaksiMember = Transaksi::where('id_user', auth()->user()->id)->get();
        $transaksiAdmin = Transaksi::get();
        return view('dashboard', compact('transaksiMember', 'transaksiAdmin'));
    }


}
