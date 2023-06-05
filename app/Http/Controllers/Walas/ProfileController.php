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
            'alamat' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kode_pos' => 'required',
        ]);

        $walas = WaliKelas::find($id);
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

    public function changePassword()
    {
        return view('change-password.change-password');
    }

    public function updatePassword(Request $request, $id)
    {
        // dd($request->all());
        $request->validate(
            [
                'old_password' => 'required',
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
            ],
            [
                'old_password.required' => 'Password lama tidak boleh kosong!',
                'password.required' => 'Password Baru tidak boleh kosong!',
                'confirm_password.required' => 'Password Konfirmasi tidak boleh kosong!',
                'password.min' => 'Password minimal 6 karakter!',
                'confirm_password.min' => 'Password minimal 6 karakter!',
                'confirm_password.same' => 'Konfirmasi password tidak sesuai!',
            ]
        );

        $user = User::find($id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect()->back()->with('success_message', 'Password berhasil diubah!');
        } else {
            return redirect()->back()->with('error_message', 'Password lama tidak sesuai!');
        }
    }
}
