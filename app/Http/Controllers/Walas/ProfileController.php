<?php

namespace App\Http\Controllers\Walas;

use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('walas.profile.edit');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'telp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kode_pos' => 'required',
        ]);

        $walas = WaliKelas::find($id);
        if ($request->old_password || $request->password || $request->confirm_password) {
            $request->validate([
                'old_password' => 'required|min:5|max:14',
                'password' => 'required|min:5|max:14',
                'confirm_password' => 'required|min:5|max:14',
            ]);
            $user = User::find($walas->user_id);
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->confirm_password) {
                    $user->password = bcrypt($request->password);
                    $user->save();
                } else {
                    return redirect()->back()->with('error_message', 'Konfirmasi Password tidak sesuai!');
                }
            } else {
                return redirect()->back()->with('error_message', 'Password lama tidak sesuai!');
            }
        }

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
        $walas->foto = $image_name;
        $walas->telp = $request->telp;
        $walas->alamat = $request->alamat;
        $walas->provinsi = $request->provinsi;
        $walas->kabupaten = $request->kabupaten;
        $walas->kecamatan = $request->kecamatan;
        $walas->desa = $request->desa;
        $walas->kode_pos = $request->kode_pos;
        $walas->save();

        return redirect()->back()->with('success_message', 'Data Berhasil Diubah.');
    }
}
