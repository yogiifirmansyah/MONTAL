<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WaliKelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $waliKelas = WaliKelas::all();
        return view('admin.kelas.index', compact('kelas', 'waliKelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'waliKelasId' => 'required|integer',
            'kelasName' => 'required|string'
        ], [
            'waliKelasId.integer' => 'Belum memilih wali kelas!',
            'kelasName.required' => 'Nama kelas tidak boleh kosong!',
        ]);

        $kelas = new Kelas;
        $kelas->wali_kelas_id = $request->waliKelasId;
        $kelas->nama_kelas = $request->kelasName;
        $kelas->save();

        session()->flash('success_message', 'Data Berhasil Ditambahkan');
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return response()->json($kelas);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'waliKelasId' => 'required|integer',
            'kelasName' => 'required|string'
        ], [
            'waliKelasId.integer' => 'Belum memilih wali kelas!',
            'kelasName.required' => 'Nama kelas tidak boleh kosong!',
        ]);

        $kelas = Kelas::find($id);
        $kelas->wali_kelas_id = $request->waliKelasId;
        $kelas->nama_kelas = $request->kelasName;
        $kelas->save();

        session()->flash('success_message', 'Data Berhasil Diubah');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();

        session()->flash('success_message', 'Data Berhasil Dihapus');
        return response()->json(['success' => true]);
    }
}
