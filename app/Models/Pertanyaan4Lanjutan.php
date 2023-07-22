<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan4Lanjutan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan4_lanjutans';

    protected $fillable = [
        'pertanyaan_umum_id',
        'item_1',
        'item_2',
        'item_3',
        'item_4',
        'item_5',
        'item_6',
    ];
}
