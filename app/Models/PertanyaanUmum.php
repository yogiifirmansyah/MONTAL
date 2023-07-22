<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanUmum extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan_umums';

    protected $fillable = [
        'siswa_id',
        'item_1',
        'item_2',
        'item_3',
        'item_4',
        'item_5',
        'item_6',
        'item_7',
        'item_8',
        'item_9',
        'item_10',
        'item_11',
        'item_12',
        'item_13',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public static function pertanyaanLanjutan($id)
    {
        $pertanyaan1Lanjutan = Pertanyaan1Lanjutan::where('pertanyaan_umum_id', $id)->first();
        $pertanyaan2Lanjutan = Pertanyaan2Lanjutan::where('pertanyaan_umum_id', $id)->first();
        $pertanyaan3Lanjutan = Pertanyaan3Lanjutan::where('pertanyaan_umum_id', $id)->first();
        $pertanyaan4Lanjutan = Pertanyaan4Lanjutan::where('pertanyaan_umum_id', $id)->first();
        $pertanyaan5Lanjutan = Pertanyaan5Lanjutan::where('pertanyaan_umum_id', $id)->first();
        $pertanyaan6Lanjutan = Pertanyaan6Lanjutan::where('pertanyaan_umum_id', $id)->first();
        $pertanyaan7Lanjutan = Pertanyaan7Lanjutan::where('pertanyaan_umum_id', $id)->first();

        $total = [];
        if (!empty($pertanyaan1Lanjutan)) {
            array_push($total, 1);
        }

        if (!empty($pertanyaan2Lanjutan)) {
            array_push($total, 2);
        }

        if (!empty($pertanyaan3Lanjutan)) {
            array_push($total, 3);
        }

        if (!empty($pertanyaan4Lanjutan)) {
            array_push($total, 4);
        }

        if (!empty($pertanyaan5Lanjutan)) {
            array_push($total, 5);
        }

        if (!empty($pertanyaan6Lanjutan)) {
            array_push($total, 6);
        }

        if (!empty($pertanyaan7Lanjutan)) {
            array_push($total, 7);
        }

        return $total;
    }
}
