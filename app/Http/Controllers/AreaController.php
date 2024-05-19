<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::get();

        return view('area.index',compact('area'));
    }

    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_area' => 'required',
            'lokasi' => 'required',
        ]);

        Area::create([
            'kode_area' => $request->kode_area,
            'lokasi' => $request->lokasi,

        ]);

        return redirect()->route('area.index');

    }

    public function show($id) 
    {
        $area = Area::findOrFail($id);

        return view('area.detail', compact('area'));

    }
    public function edit($id) 
    {
        $area = Area::findOrFail($id);

        return view('area.edit', compact('area'));

    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_area' => 'required',
            'lokasi' => 'required',
        ]);
    
        $area = area::findOrFail($id);
    
        $area->kode_area = $request->kode_area;
        $area->lokasi = $request->lokasi;

        $area->save();
    
        return redirect()->route('area.index');
    }
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->route('area.index');
    }
}
