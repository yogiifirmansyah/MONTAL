<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelasName' => 'required|string'
        ]);

        $kelas = new Kelas;
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
            'kelasName' => 'required|string'
        ]);

        $kelas = Kelas::find($id);
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
