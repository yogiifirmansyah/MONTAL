<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'wali_kelas_id',
        'nama_kelas'
    ];

    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class, 'wali_kelas_id', 'id');
    }
}
