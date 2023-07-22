<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPerkembangan extends Model
{
    use HasFactory;

    protected $table = 'laporan_perkembangans';

    protected $fillable = [
        'indikator_id',
        'siswa_id',
        'nilai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'indikator_id', 'id');
    }

    public static function nilaiRataRata($siswaId)
    {
        $laporanPerkembangan = LaporanPerkembangan::where('siswa_id', $siswaId)->get();
        $nilai = [];
        foreach ($laporanPerkembangan as $key => $value) {
            array_push($nilai, $value->nilai);
        }

        if (!empty($nilai)) {
            $hasil = array_sum($nilai) / count($nilai);
            return number_format($hasil, 2, '.', '');
        } else {
            return 0;
        }
    }
}
