<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggans = Pelanggan::paginate(5);
    
        return view('pelanggan.index', [
            'pelanggan' => $pelanggans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }
    
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required'
        ]);
    
        $array = $request->only([
            'nama', 'alamat', 'jenis_kelamin', 'umur'
        ]);
    
        $pelanggans = Pelanggan::create($array);
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil menambah pelanggan baru');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $pelanggans = Pelanggan::find($id);
        if (!$pelanggans) return redirect()->route('pelanggan.index')
            ->with('error_message', 'pelanggan dengan id'.$id.' tidak ditemukan');
    
        return view('pelanggan.edit', [
            'pelanggan' => $pelanggans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required'
        ]);
    
        $pelanggans = Pelanggan::find($id);
        $pelanggans->nama = $request->nama;
        $pelanggans->alamat = $request->alamat;
        $pelanggans->jenis_kelamin = $request->jenis_kelamin;
        $pelanggans->umur = $request->umur;
        $pelanggans->save();
    
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil mengubah Data Pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggans = Pelanggan::find($id);
        if ($pelanggans) $pelanggans->delete();
    
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil menghapus user');
    
    }
}