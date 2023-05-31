<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index()
    {
        $waliKelas = WaliKelas::all();
        return view('admin.wali-kelas.index', compact('waliKelas'));
    }

    public function create()
    {
        return view('admin.wali-kelas.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nip' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kode_pos' => 'required',
            'role' => 'required',
        ]);

        // // Store data in database users
        $user = new User;
        $user->name = $request->nama_depan . ' ' . $request->nama_belakang;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->role = $request->role;
        $user->save();

        $user_id = User::orderBy('id', 'DESC')->pluck('id')->first();
        // Store data in database wali kelas
        $walas = new WaliKelas;
        $walas->user_id = $user_id;
        $walas->nip = $request->nip;
        $walas->nama_depan = $request->nama_depan;
        $walas->nama_belakang = $request->nama_belakang;
        $walas->tanggal_lahir = $request->tanggal_lahir;
        $walas->tempat_lahir = $request->tempat_lahir;
        $walas->telp = $request->telp;
        $walas->email = $request->email;
        $walas->alamat = $request->alamat;
        $walas->provinsi = $request->provinsi;
        $walas->kabupaten = $request->kabupaten;
        $walas->kecamatan = $request->kecamatan;
        $walas->desa = $request->desa;
        $walas->kode_pos = $request->kode_pos;
        $walas->save();



        return redirect('admin/wali-kelas')->with('success_message', 'Data Berhasil Ditambahkan.');
    }
}
