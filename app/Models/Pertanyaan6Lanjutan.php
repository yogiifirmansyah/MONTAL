<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan6Lanjutan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan6_lanjutans';

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
        'item_9',
        'item_10',
        'item_11',
        'item_12',
        'item_13',
        'item_14',
        'item_15',
        'item_16',
        'item_17',
        'item_18',
    ];
}
