<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan5Lanjutan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan5_lanjutans';

    protected $fillable = [
        'pertanyaan_umum_id',
        'item_1',
        'item_2',
        'item_3',
        'item_4',
        'item_5',
        'item_6',
        'item_7',
        'item_8',
    ];
}
