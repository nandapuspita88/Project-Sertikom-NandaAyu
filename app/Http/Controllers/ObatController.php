<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class ObatController extends Controller
{

    public function index()
    {
        $obats = Obat::paginate(5);

        return view('obat.index', [
            'obat' => $obats
        ]);
    }

   
    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('obat.create', compact('pelanggans'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required'

        ]);
    
        $array = $request->only([
            'nama','pelanggan_id', 'jenis','harga'
        ]);
    
        $obats = Obat::create($array);
        return redirect()->route('obat.index')
            ->with('success_message', 'Berhasil menambah Data');
    
    }


    public function show(obat $obat)
    {
        //
    }


    public function edit(Request $request,$id)
    {        
      
        $obats = Obat::find($id);
        $pelanggans = Pelanggan::all();
        if (!$obats) return redirect()->route('obat.index')
            ->with('error_message', 'pemesan dengan id'.$id.' tidak ditemukan');
            
        return view('obat.edit',compact('obats','pelanggans'),[
            'obat' => $obats,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'harga' => 'required'
        ]);
    
        $obats = Obat::find($id);
        $obats->pelanggan_id = $request->pelanggan_id;
        $obats->nama = $request->nama;
        $obats->jenis = $request->jenis;
        $obats->harga = $request->harga;
        $obats->save();
    
        return redirect()->route('obat.index')
            ->with('success_message', 'Berhasil mengubah Data obat');
    }


    public function destroy($id)
    {
        $obats = Obat::find($id);
        if ($obats) $obats->delete();
        
        return redirect()->route('obat.index')
            ->with('success_message', 'Berhasil menghapus');
    }
}