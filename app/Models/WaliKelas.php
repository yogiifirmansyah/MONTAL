<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    use HasFactory;

    protected $table = 'wali_kelas';

    protected $fillable = [
        'user_id',
        'nip',
        'nama_depan',
        'nama_belakang',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'foto',
        'telp',
        'email',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'kode_pos',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
