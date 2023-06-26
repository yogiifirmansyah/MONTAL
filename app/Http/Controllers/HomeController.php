<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Indikator;
use App\Models\LaporanPerkembangan;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        $siswas = Siswa::where('status', 1)->get();
        return view('user.dashboard', compact('siswas'));
    }

    public function detailNilaiSiswa($id)
    {
        $laporanPerkembangan = LaporanPerkembangan::where('siswa_id', $id)->orderBy('id', 'ASC')->get();
        return response()->json($laporanPerkembangan);
    }

    public function walasHome()
    {
        $walas = WaliKelas::where('user_id', auth()->user()->id)->first();
        $kelas = Kelas::where('wali_kelas_id', $walas->id)->first();

        $siswas = Siswa::where('kelas_id', $kelas->id)->where('status', 1)->get();
        $siswaId = [];
        foreach ($siswas as $key => $value) {
            array_push($siswaId, $value->id);
        }

        // Bimbingan Fisik
        $indikatorBimbinganFisik = Indikator::where('variabel_id', 1)->get();
        $bimbinganFisik = [];
        foreach ($indikatorBimbinganFisik as $key => $value) {
            array_push($bimbinganFisik, $value->id);
        }

        $jumlahKeseluruhanBimbinganFisik = count($siswas) * count($indikatorBimbinganFisik);
        $totalLaporanBimbinganFisik = LaporanPerkembangan::whereIn('siswa_id', $siswaId)->whereIn('indikator_id', $bimbinganFisik)->count();

        if ($totalLaporanBimbinganFisik != 0) {
            $persentaseBimbinganFisik = $totalLaporanBimbinganFisik / $jumlahKeseluruhanBimbinganFisik * 100;
        } else {
            $persentaseBimbinganFisik = 0;
        }

        // Bimbingan Mental
        $indikatorBimbinganMental = Indikator::where('variabel_id', 2)->get();
        $bimbinganMental = [];
        foreach ($indikatorBimbinganMental as $key => $value) {
            array_push($bimbinganMental, $value->id);
        }

        $jumlahKeseluruhanBimbinganMental = count($siswas) * count($indikatorBimbinganMental);
        $totalLaporanBimbinganMental = LaporanPerkembangan::whereIn('siswa_id', $siswaId)->whereIn('indikator_id', $bimbinganMental)->count();
        if ($totalLaporanBimbinganMental != 0) {
            $persentaseBimbinganMental = $totalLaporanBimbinganMental / $jumlahKeseluruhanBimbinganMental * 100;
        } else {
            $persentaseBimbinganMental = 0;
        }
        // dd($persentaseBimbinganMental);

        // Bimbingan Sosial
        $indikatorBimbinganSosial = Indikator::where('variabel_id', 3)->get();
        $bimbinganSosial = [];
        foreach ($indikatorBimbinganSosial as $key => $value) {
            array_push($bimbinganSosial, $value->id);
        }

        $jumlahKeseluruhanBimbinganSosial = count($siswas) * count($indikatorBimbinganSosial);
        $totalLaporanBimbinganSosial = LaporanPerkembangan::whereIn('siswa_id', $siswaId)->whereIn('indikator_id', $bimbinganSosial)->count();

        if ($totalLaporanBimbinganSosial != 0) {
            $persentaseBimbinganSosial = $totalLaporanBimbinganSosial / $jumlahKeseluruhanBimbinganSosial * 100;
        } else {
            $persentaseBimbinganSosial = 0;
        }
        // dd($persentaseBimbinganSosial);

        // Kemandirian Emosional
        $indikatorKemandirianEmosional = Indikator::where('variabel_id', 4)->get();
        $KemandirianEmosional = [];
        foreach ($indikatorKemandirianEmosional as $key => $value) {
            array_push($KemandirianEmosional, $value->id);
        }

        $jumlahKeseluruhanKemandirianEmosional = count($siswas) * count($indikatorKemandirianEmosional);
        $totalLaporanKemandirianEmosional = LaporanPerkembangan::whereIn('siswa_id', $siswaId)->whereIn('indikator_id', $KemandirianEmosional)->count();

        if ($totalLaporanKemandirianEmosional != 0) {
            $persentaseKemandirianEmosional = $totalLaporanKemandirianEmosional / $jumlahKeseluruhanKemandirianEmosional * 100;
        } else {
            $persentaseKemandirianEmosional = 0;
        }
        // dd($persentaseKemandirianEmosional);

        // Kemandirian Perilaku
        $indikatorKemandirianPerilaku = Indikator::where('variabel_id', 5)->get();
        $KemandirianPerilaku = [];
        foreach ($indikatorKemandirianPerilaku as $key => $value) {
            array_push($KemandirianPerilaku, $value->id);
        }

        $jumlahKeseluruhanKemandirianPerilaku = count($siswas) * count($indikatorKemandirianPerilaku);
        $totalLaporanKemandirianPerilaku = LaporanPerkembangan::whereIn('siswa_id', $siswaId)->whereIn('indikator_id', $KemandirianPerilaku)->count();

        if ($totalLaporanKemandirianPerilaku != 0) {
            $persentaseKemandirianPerilaku = $totalLaporanKemandirianPerilaku / $jumlahKeseluruhanKemandirianPerilaku * 100;
        } else {
            $persentaseKemandirianPerilaku = 0;
        }
        // dd($persentaseKemandirianPerilaku);

        // Kemandirian Nilai
        $indikatorKemandirianNilai = Indikator::where('variabel_id', 6)->get();
        $KemandirianNilai = [];
        foreach ($indikatorKemandirianNilai as $key => $value) {
            array_push($KemandirianNilai, $value->id);
        }

        $jumlahKeseluruhanKemandirianNilai = count($siswas) * count($indikatorKemandirianNilai);
        $totalLaporanKemandirianNilai = LaporanPerkembangan::whereIn('siswa_id', $siswaId)->whereIn('indikator_id', $KemandirianNilai)->count();

        if ($totalLaporanKemandirianNilai != 0) {
            $persentaseKemandirianNilai = $totalLaporanKemandirianNilai / $jumlahKeseluruhanKemandirianNilai * 100;
        } else {
            $persentaseKemandirianNilai = 0;
        }
        // dd($persentaseKemandirianNilai);

        return view('walas.dashboard', compact(
            'persentaseBimbinganFisik',
            'totalLaporanBimbinganFisik',
            'persentaseBimbinganMental',
            'totalLaporanBimbinganMental',
            'persentaseBimbinganSosial',
            'totalLaporanBimbinganSosial',
            'persentaseKemandirianEmosional',
            'totalLaporanKemandirianEmosional',
            'persentaseKemandirianPerilaku',
            'totalLaporanKemandirianPerilaku',
            'persentaseKemandirianNilai',
            'totalLaporanKemandirianNilai',
            'kelas',
            'siswas',
        ));
    }
}
