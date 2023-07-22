<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'kelas_id',
        'nama_depan',
        'nama_belakang',
        'nisn',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'anak_ke',
        'nama_orang_tua',
        'pekerjaan_orang_tua',
        'telp',
        'alamat',
        'tanggal_masuk',
        'tanggal_keluar',
        'status',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function laporan_perkembangans()
    {
        return $this->hasMany(LaporanPerkembangan::class, 'siswa_id', 'id');
    }
}
