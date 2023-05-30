<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    protected $table = 'indikators';

    protected $fillable = [
        'nama_indikator',
        'variabel_id',
    ];

    public function variabel()
    {
        return $this->belongsTo(Variabel::class, 'variabel_id', 'id');
    }
}
