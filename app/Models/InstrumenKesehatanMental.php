<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumenKesehatanMental extends Model
{
    use HasFactory;

    protected $table = 'instrumen_kesehatan_mentals';

    protected $fillable = [
        'siswa_id',
        'item_1a',
        'item_1b',
        'item_1c',
        'item_1d',
        'item_2a',
        'item_2b',
        'item_2c',
        'item_2d',
        'item_2e',
        'item_2f',
        'item_3a',
        'item_3b',
        'item_3c',
        'item_3d',
        'item_3e',
        'item_4a',
        'item_4b',
        'item_4c',
        'item_4d',
        'item_5a',
        'item_5b',
        'item_5c',
        'item_5d',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
