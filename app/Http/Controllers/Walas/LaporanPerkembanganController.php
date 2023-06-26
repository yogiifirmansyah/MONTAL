<?php

namespace App\Http\Controllers\Walas;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Indikator;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use App\Models\LaporanPerkembangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LaporanPerkembanganController extends Controller
{
    public function siswa()
    {
        $walas = WaliKelas::where('user_id', auth()->user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();
        $siswas = Siswa::where('kelas_id', $kelas->id)->where('status', 1)->get();

        return view('walas.siswa.index', compact('siswas'));
    }

    public function bimbinganFisik()
    {
        $WaliKelasId = WaliKelas::where('user_id', Auth::user()->id)->pluck('id')->first();
        $kelasId = Kelas::where('wali_kelas_id', $WaliKelasId)->pluck('id')->first();
        $siswas = Siswa::where('kelas_id', $kelasId)->where('status', 1)->get();

        $indikators = Indikator::where('variabel_id', 1)->get();
        // dd($indikators);
        $indikatorId = [];
        foreach ($indikators as $key => $value) {
            array_push($indikatorId, $value->id);
        }
        $siswaId = [];
        foreach ($siswas as $key => $value) {
            array_push($siswaId, $value->id);
        }
        // dd($siswaId);
        $laporanPerkembangan = LaporanPerkembangan::whereIn('indikator_id', $indikatorId)->whereIn('siswa_id', $siswaId)->get();
        // dd($laporanPerkembangan);
        return view('walas.bimbingan-fisik.index', compact('siswas', 'indikators', 'laporanPerkembangan'));
    }

    public function bimbinganMental()
    {
        $WaliKelasId = WaliKelas::where('user_id', Auth::user()->id)->pluck('id')->first();
        $kelasId = Kelas::where('wali_kelas_id', $WaliKelasId)->pluck('id')->first();
        $siswas = Siswa::where('kelas_id', $kelasId)->where('status', 1)->get();

        $indikators = Indikator::where('variabel_id', 2)->get();
        $indikatorId = [];
        foreach ($indikators as $key => $value) {
            array_push($indikatorId, $value->id);
        }
        $siswaId = [];
        foreach ($siswas as $key => $value) {
            array_push($siswaId, $value->id);
        }
        // dd($siswaId);
        $laporanPerkembangan = LaporanPerkembangan::whereIn('indikator_id', $indikatorId)->whereIn('siswa_id', $siswaId)->get();
        return view('walas.bimbingan-mental.index', compact('siswas', 'indikators', 'laporanPerkembangan'));
    }

    public function bimbinganSosial()
    {
        $WaliKelasId = WaliKelas::where('user_id', Auth::user()->id)->pluck('id')->first();
        $kelasId = Kelas::where('wali_kelas_id', $WaliKelasId)->pluck('id')->first();
        $siswas = Siswa::where('kelas_id', $kelasId)->where('status', 1)->get();

        $indikators = Indikator::where('variabel_id', 3)->get();
        $indikatorId = [];
        foreach ($indikators as $key => $value) {
            array_push($indikatorId, $value->id);
        }
        $siswaId = [];
        foreach ($siswas as $key => $value) {
            array_push($siswaId, $value->id);
        }
        // dd($siswaId);
        $laporanPerkembangan = LaporanPerkembangan::whereIn('indikator_id', $indikatorId)->whereIn('siswa_id', $siswaId)->get();
        return view('walas.bimbingan-sosial.index', compact('siswas', 'indikators', 'laporanPerkembangan'));
    }

    public function kemandirianEmosional()
    {
        $WaliKelasId = WaliKelas::where('user_id', Auth::user()->id)->pluck('id')->first();
        $kelasId = Kelas::where('wali_kelas_id', $WaliKelasId)->pluck('id')->first();
        $siswas = Siswa::where('kelas_id', $kelasId)->where('status', 1)->get();

        $indikators = Indikator::where('variabel_id', 4)->get();
        $indikatorId = [];
        foreach ($indikators as $key => $value) {
            array_push($indikatorId, $value->id);
        }
        $siswaId = [];
        foreach ($siswas as $key => $value) {
            array_push($siswaId, $value->id);
        }
        // dd($siswaId);
        $laporanPerkembangan = LaporanPerkembangan::whereIn('indikator_id', $indikatorId)->whereIn('siswa_id', $siswaId)->get();
        return view('walas.kemandirian-emosional.index', compact('siswas', 'indikators', 'laporanPerkembangan'));
    }

    public function kemandirianPerilaku()
    {
        $WaliKelasId = WaliKelas::where('user_id', Auth::user()->id)->pluck('id')->first();
        $kelasId = Kelas::where('wali_kelas_id', $WaliKelasId)->pluck('id')->first();
        $siswas = Siswa::where('kelas_id', $kelasId)->where('status', 1)->get();

        $indikators = Indikator::where('variabel_id', 5)->get();
        $indikatorId = [];
        foreach ($indikators as $key => $value) {
            array_push($indikatorId, $value->id);
        }
        $siswaId = [];
        foreach ($siswas as $key => $value) {
            array_push($siswaId, $value->id);
        }
        // dd($siswaId);
        $laporanPerkembangan = LaporanPerkembangan::whereIn('indikator_id', $indikatorId)->whereIn('siswa_id', $siswaId)->get();
        return view('walas.kemandirian-perilaku.index', compact('siswas', 'indikators', 'laporanPerkembangan'));
    }

    public function kemandirianNilai()
    {
        $WaliKelasId = WaliKelas::where('user_id', Auth::user()->id)->pluck('id')->first();
        $kelasId = Kelas::where('wali_kelas_id', $WaliKelasId)->pluck('id')->first();
        $siswas = Siswa::where('kelas_id', $kelasId)->where('status', 1)->get();

        $indikators = Indikator::where('variabel_id', 6)->get();
        $indikatorId = [];
        foreach ($indikators as $key => $value) {
            array_push($indikatorId, $value->id);
        }
        $siswaId = [];
        foreach ($siswas as $key => $value) {
            array_push($siswaId, $value->id);
        }
        // dd($siswaId);
        $laporanPerkembangan = LaporanPerkembangan::whereIn('indikator_id', $indikatorId)->whereIn('siswa_id', $siswaId)->get();
        return view('walas.kemandirian-nilai.index', compact('siswas', 'indikators', 'laporanPerkembangan'));
    }

    public function store(Request $request)
    {
        $laporanPerkembangan = LaporanPerkembangan::where('indikator_id', $request->indikatorId)->where('siswa_id', $request->siswaId)->first();
        $request->validate(
            [
                'siswaId' => 'required|integer',
                'indikatorId' => 'required|integer',
                'nilai' => 'required|numeric',
            ],
            [
                'siswaId.integer' => 'Belum memilih siswa!',
                'indikatorId.integer' => 'Belum memilih indikator!',
                'nilai.required' => 'Nilai tidak boleh kosong!',
                'nilai.numeric' => 'Nilai harus menggunakan angka!',
            ]
        );

        if (!empty($laporanPerkembangan)) {
            $laporanPerkembangan = LaporanPerkembangan::find($laporanPerkembangan->id);
            $laporanPerkembangan->nilai = $request->nilai;
            $laporanPerkembangan->save();

            session()->flash('success_message', 'Data Berhasil Diubah');
            return response()->json(['success' => true]);
        } else {
            $laporanPerkembangan = new LaporanPerkembangan();
            $laporanPerkembangan->siswa_id = $request->siswaId;
            $laporanPerkembangan->indikator_id = $request->indikatorId;
            $laporanPerkembangan->nilai = $request->nilai;
            $laporanPerkembangan->save();

            session()->flash('success_message', 'Data Berhasil Ditambahkan');
            return response()->json(['success' => true]);
        }
    }

    public function show($id)
    {
        // dd($id);
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    public function edit($id)
    {
        $laporanPerkembangan = LaporanPerkembangan::find($id);
        $siswa = Siswa::where('id', $laporanPerkembangan->siswa_id)->select('nama_depan', 'nama_belakang')->first();
        $indikator = Indikator::where('id', $laporanPerkembangan->indikator_id)->pluck('nama_indikator')->first();

        return response()->json([
            'laporan' => $laporanPerkembangan,
            'siswa' => $siswa,
            'indikator' => $indikator
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate(
            [
                'nilai' => 'required|numeric',
            ],
            [
                'nilai.required' => 'Nilai tidak boleh kosong!',
                'nilai.numeric' => 'Nilai harus menggunakan angka!',
            ]
        );

        $laporanPerkembangan = LaporanPerkembangan::find($id);
        $laporanPerkembangan->nilai = $request->nilai;
        $laporanPerkembangan->save();

        session()->flash('success_message', 'Data Berhasil Diubah');
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        LaporanPerkembangan::where('id', $id)->delete();

        session()->flash('success_message', 'Data Berhasil Dihapus');
        return response()->json(['success' => true]);
    }
}
