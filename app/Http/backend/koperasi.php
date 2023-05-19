<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KoperasiController extends Controller
{   // untuk mengambil data
    public function index (){
        $data_anggota = DB::table('data_anggota')->get();
        return view('backend.data_anggota.index', compact('data_anggota'));
    }
    // untuk menambah data
    public function create (){
        $data_anggota = null;
        return view('backend.data_anggota.create', compact('data_anggota'));
    }

    public function store (Request $request){
        DB::table('data_anggota')->insert([ 'nama' => $request->nama,
        'dept' => $request->dept,
        'jenis_simpanan' => $request->jenis_simpanan
        ]);
        return redirect()->route('data_anggota.index')
        ->with('success', 'Data anggota baru telah berhasil disimpan.');
    }
    // untuk menghapus data
    public function destroy($id)
    {
    DB::table('data_anggota')->where('id', $id)->delete();
    return redirect()->route('data_anggota.index')
        ->with('success', 'Data anggota telah berhasil dihapus.');
    }
    //untuk mengupdate data
    public function edit($id)
    {
        $data_anggota = DB::table('data_anggota')->where('id', $id)->first();
        return view('backend.data_anggota.edit', compact('data_anggota'));
    }

    public function update(Request $request, $id)
    {
        DB::table('pdata_anggota')->where('id', $id)->update([
            'nama' => $request->nama,
            'dept' => $request->dept,
            'jenis_simpanan' => $request->jenis_simpanan
        ]);
        return redirect()->route('data_anggota.index')
            ->with('success', 'Data anggota telah berhasil diupdate.');
    }
    
}