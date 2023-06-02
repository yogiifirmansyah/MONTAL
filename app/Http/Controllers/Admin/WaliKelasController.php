<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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
        // dd($request->file('foto'));
        $request->validate([
            'nip' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
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

        // Upload Photo
        if ($request->hasFile('foto')) {
            $image_tmp = $request->file('foto');
            if ($image_tmp->isValid()) {
                // Get Extension
                $ext = $image_tmp->getClientOriginalExtension();
                // Generate new Image name
                $image_name = 'Photo' . rand(111, 999) . '.' . $ext;
                $image_path = 'assets/images/photos/wali-kelas/' . $image_name;
                // Upload Image
                Image::make($image_tmp)->save($image_path);
            }
        } else if (!empty($data['current_image'])) {
            $image_name = $data['current_image'];
        } else {
            $image_name = null;
        }

        $user_id = User::orderBy('id', 'DESC')->pluck('id')->first();
        // Store data in database wali kelas
        $walas = new WaliKelas;
        $walas->user_id = $user_id;
        $walas->nip = $request->nip;
        $walas->nama_depan = $request->nama_depan;
        $walas->nama_belakang = $request->nama_belakang;
        $walas->tanggal_lahir = $request->tanggal_lahir;
        $walas->tempat_lahir = $request->tempat_lahir;
        $walas->jenis_kelamin = $request->jenis_kelamin;
        $walas->foto = $image_name;
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

    public function edit($id)
    {
        $walas = WaliKelas::where('id', $id)->first();
        return view('admin.wali-kelas.edit', compact('walas'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nip' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
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

        $walas = WaliKelas::find($id);
        $user_id = User::where('id', $walas->user_id)->pluck('id')->first();
        // // Store data in database users
        $user = User::find($user_id);
        $user->name = $request->nama_depan . ' ' . $request->nama_belakang;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->role = $request->role;
        $user->save();

        // Upload Photo
        if ($request->hasFile('foto')) {
            $image_tmp = $request->file('foto');
            if ($image_tmp->isValid()) {
                $pathPhotos = 'assets/images/photos/wali-kelas/' . $walas->foto;
                if (!empty($walas->foto)) {
                    if (file_exists($pathPhotos)) {
                        unlink($pathPhotos);
                    }
                }
                // Get Extension
                $ext = $image_tmp->getClientOriginalExtension();
                // Generate new Image name
                $image_name = 'Photo' . rand(111, 999) . '.' . $ext;
                $image_path = 'assets/images/photos/wali-kelas/' . $image_name;
                // Upload Image
                Image::make($image_tmp)->save($image_path);
            }
        } else if (!empty($request->current_image)) {
            $image_name = $request->current_image;
        } else {
            $image_name = null;
        }

        // Store data in database wali kelas
        $walas->user_id = $user_id;
        $walas->nip = $request->nip;
        $walas->nama_depan = $request->nama_depan;
        $walas->nama_belakang = $request->nama_belakang;
        $walas->tanggal_lahir = $request->tanggal_lahir;
        $walas->tempat_lahir = $request->tempat_lahir;
        $walas->jenis_kelamin = $request->jenis_kelamin;
        $walas->foto = $image_name;
        $walas->telp = $request->telp;
        $walas->email = $request->email;
        $walas->alamat = $request->alamat;
        $walas->provinsi = $request->provinsi;
        $walas->kabupaten = $request->kabupaten;
        $walas->kecamatan = $request->kecamatan;
        $walas->desa = $request->desa;
        $walas->kode_pos = $request->kode_pos;
        $walas->save();

        return redirect('admin/wali-kelas')->with('success_message', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $walas = WaliKelas::find($id);
        $user = User::where('id', $walas->user_id)->first();

        if (!empty($walas->foto)) {
            $pathPhotos = 'assets/images/photos/wali-kelas/' . $walas->foto;
            if (file_exists($pathPhotos)) {
                unlink($pathPhotos);
            }
        }
        $walas->delete();
        $user->delete();

        session()->flash('success_message', 'Data Berhasil Dihapus');
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        // dd($id);
        $walas = WaliKelas::find($id);
        return response()->json($walas);
    }
}
