<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Indikator;
use App\Models\WaliKelas;
use Illuminate\Http\Request;
use App\Models\PertanyaanUmum;
use App\Models\LaporanPerkembangan;
use App\Models\Pertanyaan1Lanjutan;
use App\Models\Pertanyaan2Lanjutan;
use App\Models\Pertanyaan3Lanjutan;
use App\Models\Pertanyaan4Lanjutan;
use App\Models\Pertanyaan5Lanjutan;
use App\Models\Pertanyaan6Lanjutan;
use App\Models\Pertanyaan7Lanjutan;
use App\Models\InstrumenKesehatanMental;
use Illuminate\Support\Facades\Auth;

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
        $siswa = Siswa::where('user_id', Auth::user()->id)->where('status', 1)->first();
        return view('user.dashboard', compact('siswa'));
    }

    public function detailNilaiSiswa($id)
    {
        $laporanPerkembangan = LaporanPerkembangan::where('siswa_id', $id)->orderBy('id', 'ASC')->get();
        return response()->json($laporanPerkembangan);
    }

    public function pertanyaan1Lanjutan($id)
    {
        // Pertanyaan 1 Lanjutan
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        $pertanyaan1Lanjutan = Pertanyaan1Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();
        $y1 = [];
        $n1 = [];
        if (!empty($pertanyaan1Lanjutan)) {
            if ($pertanyaan1Lanjutan->item_1 == 'Y') {
                array_push($y1, 1);
            } else {
                array_push($n1, 1);
            }
            if ($pertanyaan1Lanjutan->item_2 == 'Y') {
                array_push($y1, 1);
            } else {
                array_push($n1, 1);
            }
            if ($pertanyaan1Lanjutan->item_3 == 'Y') {
                array_push($y1, 1);
            } else {
                array_push($n1, 1);
            }
            if ($pertanyaan1Lanjutan->item_4 == 'Y') {
                array_push($y1, 1);
            } else {
                array_push($n1, 1);
            }
            if ($pertanyaan1Lanjutan->item_5 == 'Y') {
                array_push($y1, 1);
            } else {
                array_push($n1, 1);
            }
            if ($pertanyaan1Lanjutan->item_6 == 'Y') {
                array_push($y1, 1);
            } else {
                array_push($n1, 1);
            }
            if ($pertanyaan1Lanjutan->item_7 == 'Y') {
                array_push($y1, 1);
            } else {
                array_push($n1, 1);
            }
        }

        $y1 = array_sum($y1);
        $n1 = array_sum($n1);

        return view('user.pertanyaan-lanjutan.pertanyaan-1', compact('pertanyaanUmum', 'pertanyaan1Lanjutan', 'y1', 'n1'));
    }

    public function pertanyaan2Lanjutan($id)
    {
        // Pertanyaan 2 Lanjutan
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        $pertanyaan2Lanjutan = Pertanyaan2Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();
        $y2 = [];
        $n2 = [];
        if (!empty($pertanyaan2Lanjutan)) {
            if ($pertanyaan2Lanjutan->item_1 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_2 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_3 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_4 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_5 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_6 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_7 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_8 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
            if ($pertanyaan2Lanjutan->item_9 == 'Y') {
                array_push($y2, 1);
            } else {
                array_push($n2, 1);
            }
        }


        $y2 = array_sum($y2);
        $n2 = array_sum($n2);

        return view('user.pertanyaan-lanjutan.pertanyaan-2', compact('pertanyaanUmum', 'pertanyaan2Lanjutan', 'y2', 'n2'));
    }

    public function pertanyaan3Lanjutan($id)
    {
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        // Pertanyaan 3 Lanjutan
        $pertanyaan3Lanjutan = Pertanyaan3Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();
        $y3 = [];
        $n3 = [];
        if (!empty($pertanyaan3Lanjutan)) {
            if ($pertanyaan3Lanjutan->item_1 == 'Y') {
                array_push($y3, 1);
            } else {
                array_push($n3, 1);
            }
            if ($pertanyaan3Lanjutan->item_2 == 'Y') {
                array_push($y3, 1);
            } else {
                array_push($n3, 1);
            }
            if ($pertanyaan3Lanjutan->item_3 == 'Y') {
                array_push($y3, 1);
            } else {
                array_push($n3, 1);
            }
            if ($pertanyaan3Lanjutan->item_4 == 'Y') {
                array_push($y3, 1);
            } else {
                array_push($n3, 1);
            }
            if ($pertanyaan3Lanjutan->item_5 == 'Y') {
                array_push($y3, 1);
            } else {
                array_push($n3, 1);
            }
            if ($pertanyaan3Lanjutan->item_6 == 'Y') {
                array_push($y3, 1);
            } else {
                array_push($n3, 1);
            }
        }

        $y3 = array_sum($y3);
        $n3 = array_sum($n3);
        return view('user.pertanyaan-lanjutan.pertanyaan-3', compact('pertanyaanUmum', 'pertanyaan3Lanjutan', 'y3', 'n3'));
    }

    public function pertanyaan4Lanjutan($id)
    {
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        // Pertanyaan 4 Lanjutan
        $pertanyaan4Lanjutan = Pertanyaan4Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();
        $y4 = [];
        $n4 = [];
        if (!empty($pertanyaan4Lanjutan)) {
            if ($pertanyaan4Lanjutan->item_1 == 'Y') {
                array_push($y4, 1);
            } else {
                array_push($n4, 1);
            }
            if ($pertanyaan4Lanjutan->item_2 == 'Y') {
                array_push($y4, 1);
            } else {
                array_push($n4, 1);
            }
            if ($pertanyaan4Lanjutan->item_3 == 'Y') {
                array_push($y4, 1);
            } else {
                array_push($n4, 1);
            }
            if ($pertanyaan4Lanjutan->item_4 == 'Y') {
                array_push($y4, 1);
            } else {
                array_push($n4, 1);
            }
            if ($pertanyaan4Lanjutan->item_5 == 'Y') {
                array_push($y4, 1);
            } else {
                array_push($n4, 1);
            }
            if ($pertanyaan4Lanjutan->item_6 == 'Y') {
                array_push($y4, 1);
            } else {
                array_push($n4, 1);
            }
        }


        $y4 = array_sum($y4);
        $n4 = array_sum($n4);
        return view('user.pertanyaan-lanjutan.pertanyaan-4', compact('pertanyaanUmum', 'pertanyaan4Lanjutan', 'y4', 'n4'));
    }

    public function pertanyaan5Lanjutan($id)
    {
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        // Pertanyaan 5 Lanjutan
        $pertanyaan5Lanjutan = Pertanyaan5Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();
        $y5 = [];
        $n5 = [];
        if (!empty($pertanyaan5Lanjutan)) {
            if ($pertanyaan5Lanjutan->item_1 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
            if ($pertanyaan5Lanjutan->item_2 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
            if ($pertanyaan5Lanjutan->item_3 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
            if ($pertanyaan5Lanjutan->item_4 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
            if ($pertanyaan5Lanjutan->item_5 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
            if ($pertanyaan5Lanjutan->item_6 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
            if ($pertanyaan5Lanjutan->item_7 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
            if ($pertanyaan5Lanjutan->item_8 == 'Y') {
                array_push($y5, 1);
            } else {
                array_push($n5, 1);
            }
        }

        $y5 = array_sum($y5);
        $n5 = array_sum($n5);
        return view('user.pertanyaan-lanjutan.pertanyaan-5', compact('pertanyaanUmum', 'pertanyaan5Lanjutan', 'y5', 'n5'));
    }

    public function pertanyaan6Lanjutan($id)
    {
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        // Pertanyaan 6 Lanjutan
        $pertanyaan6Lanjutan = Pertanyaan6Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();
        $y6 = [];
        $n6 = [];
        if (!empty($pertanyaan6Lanjutan)) {
            if ($pertanyaan6Lanjutan->item_1 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_2 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_3 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_4 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_5 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_6 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_7 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_8 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_9 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_10 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_11 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_12 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_13 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_14 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_15 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_16 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_17 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
            if ($pertanyaan6Lanjutan->item_18 == 'Y') {
                array_push($y6, 1);
            } else {
                array_push($n6, 1);
            }
        }


        $y6 = array_sum($y6);
        $n6 = array_sum($n6);
        return view('user.pertanyaan-lanjutan.pertanyaan-6', compact('pertanyaanUmum', 'pertanyaan6Lanjutan', 'y6', 'n6'));
    }

    public function pertanyaan7Lanjutan($id)
    {
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        // Pertanyaan 7 Lanjutan
        $pertanyaan7Lanjutan = Pertanyaan7Lanjutan::where('pertanyaan_umum_id', $pertanyaanUmum->id)->first();
        $y7 = [];
        $n7 = [];
        if (!empty($pertanyaan7Lanjutan)) {
            if ($pertanyaan7Lanjutan->item_1 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_2 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_3 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_4 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_5 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_6 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_7 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_8 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
            if ($pertanyaan7Lanjutan->item_9 == 'Y') {
                array_push($y7, 1);
            } else {
                array_push($n7, 1);
            }
        }

        $y7 = array_sum($y7);
        $n7 = array_sum($n7);
        return view('user.pertanyaan-lanjutan.pertanyaan-7', compact('pertanyaanUmum', 'pertanyaan7Lanjutan', 'y7', 'n7'));
    }

    public function detailInstrumen1($id)
    {
        $pertanyaanUmum = PertanyaanUmum::where('siswa_id', $id)->first();
        $siswa = Siswa::where('id', $id)->first();

        return view('user.detail-instrumen-1', compact(
            'siswa',
            'pertanyaanUmum',
        ));
    }

    public function detailInstrumen2($id)
    {
        $instrumenKesehatanMental = InstrumenKesehatanMental::where('siswa_id', $id)->first();
        $siswa = Siswa::where('id', $id)->first();

        return view('user.detail-instrumen-2', compact(
            'siswa',
            'instrumenKesehatanMental',
        ));
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
