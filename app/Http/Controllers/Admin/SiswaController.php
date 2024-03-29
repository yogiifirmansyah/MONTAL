<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Date;
use Intervention\Image\Facades\Image;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $random = rand(0, 9999);

        return view('admin.siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'kelas_id' => 'required',
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'nisn' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'anak_ke.*' => 'required',
                'nama_orang_tua' => 'required',
                'pekerjaan_orang_tua' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                'tanggal_masuk' => 'required',
                'status' => 'required',
            ],
            [
                'kelas_id.required' => 'Kelas tidak boleh kosong!',
                'nama_depan.required' => 'Nama depan tidak boleh kosong!',
                'nama_belakang.required' => 'Nama Belakang tidak boleh kosong!',
                'nisn.required' => 'NISN tidak boleh kosong!',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong!',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong!',
                'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong!',
                'agama.required' => 'Agama tidak boleh kosong!',
                'anak_ke[].required' => 'Anak ke dari jumlah bersaudara tidak boleh kosong!',
                'nama_orang_tua.required' => 'Nama orang tua tidak boleh kosong!',
                'pekerjaan_orang_tua.required' => 'Pekerjaan orang tua tidak boleh kosong!',
                'telp.required' => 'Telepon tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!',
                'tanggal_masuk.required' => 'Tanggal masuk tidak boleh kosong!',
                'status.required' => 'Status tidak boleh kosong!',
            ]

        );

        // // Store data in database users
        $user = new User;
        $user->name = $request->nama_depan . ' ' . $request->nama_belakang;
        $user->email = strtolower($request->nama_depan) . '.' . rand(0, 999) . '@gmail.com';
        $user->password = bcrypt($request->nisn);
        $user->role = 0;
        $user->save();

        // Upload Photo
        if ($request->hasFile('foto')) {
            $image_tmp = $request->file('foto');
            if ($image_tmp->isValid()) {
                // Get Extension
                $ext = $image_tmp->getClientOriginalExtension();
                // Generate new Image name
                $image_name = 'Photo' . rand(111, 999) . '.' . $ext;
                $image_path = 'assets/images/photos/siswa/' . $image_name;
                // Upload Image
                Image::make($image_tmp)->save($image_path);
            }
        } else if (!empty($data['current_image'])) {
            $image_name = $data['current_image'];
        } else {
            $image_name = null;
        }

        $user_id = User::orderBy('id', 'DESC')->pluck('id')->first();
        // Store data in database siswa
        $siswa = new Siswa;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->user_id = $user_id;
        $siswa->nama_depan = $request->nama_depan;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->nisn = $request->nisn;
        $siswa->foto = $image_name;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->anak_ke = implode(',', $request->anak_ke);
        $siswa->nama_orang_tua = $request->nama_orang_tua;
        $siswa->pekerjaan_orang_tua = $request->pekerjaan_orang_tua;
        $siswa->telp = $request->telp;
        $siswa->alamat = $request->alamat;
        $siswa->tanggal_masuk = $request->tanggal_masuk;
        $siswa->status = $request->status;
        $siswa->save();

        return redirect('admin/siswa')->with('success_message', 'Data Berhasil Ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $kelas = Kelas::all();
        return view('admin.siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate(
            [
                'kelas_id' => 'required',
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'nisn' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'anak_ke.*' => 'required',
                'nama_orang_tua' => 'required',
                'pekerjaan_orang_tua' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                'tanggal_masuk' => 'required',
                'status' => 'required',
            ],
            [
                'kelas_id.required' => 'Kelas tidak boleh kosong!',
                'nama_depan.required' => 'Nama depan tidak boleh kosong!',
                'nama_belakang.required' => 'Nama Belakang tidak boleh kosong!',
                'nisn.required' => 'NISN tidak boleh kosong!',
                'tempat_lahir.required' => 'Tempat lahir tidak boleh kosong!',
                'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong!',
                'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong!',
                'agama.required' => 'Agama tidak boleh kosong!',
                'anak_ke[].required' => 'Anak ke dari jumlah bersaudara tidak boleh kosong!',
                'nama_orang_tua.required' => 'Nama orang tua tidak boleh kosong!',
                'pekerjaan_orang_tua.required' => 'Pekerjaan orang tua tidak boleh kosong!',
                'telp.required' => 'Telepon tidak boleh kosong!',
                'alamat.required' => 'Alamat tidak boleh kosong!',
                'tanggal_masuk.required' => 'Tanggal masuk tidak boleh kosong!',
                'status.required' => 'Status tidak boleh kosong!',
            ]

        );


        $siswa = Siswa::find($id);
        // Upload Photo
        if ($request->hasFile('foto')) {
            $image_tmp = $request->file('foto');
            if ($image_tmp->isValid()) {
                $pathPhotos = 'assets/images/photos/siswa/' . $siswa->foto;
                if (!empty($siswa->foto)) {
                    if (file_exists($pathPhotos)) {
                        unlink($pathPhotos);
                    }
                }
                // Get Extension
                $ext = $image_tmp->getClientOriginalExtension();
                // Generate new Image name
                $image_name = 'Photo' . rand(111, 999) . '.' . $ext;
                $image_path = 'assets/images/photos/siswa/' . $image_name;
                // Upload Image
                Image::make($image_tmp)->save($image_path);
            }
        } else if (!empty($data['current_image'])) {
            $image_name = $data['current_image'];
        } else {
            $image_name = null;
        }

        // Store data in database wali kelas
        $siswa->kelas_id = $request->kelas_id;
        $siswa->nama_depan = $request->nama_depan;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->nisn = $request->nisn;
        $siswa->foto = $image_name;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->anak_ke = implode(',', $request->anak_ke);
        $siswa->nama_orang_tua = $request->nama_orang_tua;
        $siswa->pekerjaan_orang_tua = $request->pekerjaan_orang_tua;
        $siswa->telp = $request->telp;
        $siswa->alamat = $request->alamat;
        $siswa->tanggal_masuk = $request->tanggal_masuk;
        $siswa->status = $request->status;
        $siswa->save();

        return redirect('admin/siswa')->with('success_message', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!empty($siswa->foto)) {
            $pathPhotos = 'assets/images/photos/' . $siswa->foto;
            if (file_exists($pathPhotos)) {
                unlink($pathPhotos);
            }
        }
        $siswa->delete();

        session()->flash('success_message', 'Data Berhasil Dihapus');
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        // dd($id);
        $siswa = Siswa::find($id);
        $usia = Carbon::parse($siswa->tanggal_lahir)->age;
        return response()->json([
            'siswa' => $siswa,
            'usia' => $usia,
        ]);
    }
}
