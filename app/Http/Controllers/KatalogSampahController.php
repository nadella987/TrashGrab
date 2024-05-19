<?php

namespace App\Http\Controllers;

use App\Models\KatalogSampah;
use App\Services\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KatalogSampahController extends Controller
{
    public function index()
    {
        $katalogSampah = KatalogSampah::get();

        return view('katalogSampah.index',compact('katalogSampah'));
    }

    public function create()
    {
        return view('katalogSampah.create');
    }

    public function store(Request $request,FileUploader $fileUploader)
    {
        $validator = Validator::make($request->all(), [
            'jenis_sampah' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
        ]);
        $fotoUrl = $fileUploader->upload($request->file('foto'), 'foto');
        KatalogSampah::create([
            'jenis_sampah' => $request->jenis_sampah,
            'foto' =>  $fotoUrl,
            'harga' => $request->harga,
        ]);

        return redirect()->route('katalogSampah.index');

    }

    public function show($id) 
    {
        $katalogSampah = KatalogSampah::findOrFail($id);

        return view('katalogSampah.detail', compact('katalogSampah'));

    }
    public function edit($id) 
    {
        $katalogSampah = KatalogSampah::findOrFail($id);

        return view('katalogSampah.edit', compact('katalogSampah'));

    }
    
    public function update(Request $request, $id, FileUploader $fileUploader)
    {
        $request->validate([
            'jenis_sampah' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
        ]);
    
        $katalogSampah = KatalogSampah::findOrFail($id);
    
        if ($request->hasFile('foto')) {
            $fotoUrl = $fileUploader->upload($request->file('foto'), 'foto');
            $katalogSampah->foto = $fotoUrl;
        }

        $katalogSampah->jenis_sampah = $request->jenis_sampah;
        $katalogSampah->harga = $request->harga;
    
        $katalogSampah->save();
    
        return redirect()->route('katalogSampah.index');
    }

    
    public function destroy($id)
    {
        $katalogSampah = KatalogSampah::findOrFail($id);
        $katalogSampah->delete();

        return redirect()->route('katalogSampah.index');
    }
    
}
