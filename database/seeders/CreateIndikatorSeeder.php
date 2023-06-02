<?php

namespace Database\Seeders;

use App\Models\Indikator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $indikators = [
            [
                'id' => 1,
                'nama_indikator' => 'Olahraga',
                'variabel_id' => 1,
            ],
            [
                'id' => 2,
                'nama_indikator' => 'Pemeliharan Kesehatan',
                'variabel_id' => 1,
            ],
            [
                'id' => 3,
                'nama_indikator' => 'Keagamaan',
                'variabel_id' => 2,
            ],
            [
                'id' => 4,
                'nama_indikator' => 'Kedisiplinan',
                'variabel_id' => 2,
            ],
            [
                'id' => 5,
                'nama_indikator' => 'Sosial Perseorangan',
                'variabel_id' => 3,
            ],
            [
                'id' => 6,
                'nama_indikator' => 'Sosial Kemasyarakatan',
                'variabel_id' => 3,
            ],
            [
                'id' => 7,
                'nama_indikator' => 'Activity Daily Living',
                'variabel_id' => 3,
            ],
            [
                'id' => 8,
                'nama_indikator' => 'Kemampuan Berelasi',
                'variabel_id' => 4,
            ],
            [
                'id' => 9,
                'nama_indikator' => 'Berdiri Sendiri',
                'variabel_id' => 4,
            ],
            [
                'id' => 10,
                'nama_indikator' => 'Mengendalikan Emosi',
                'variabel_id' => 4,
            ],
            [
                'id' => 11,
                'nama_indikator' => 'Memecahkan Masalah',
                'variabel_id' => 5,
            ],
            [
                'id' => 12,
                'nama_indikator' => 'Menyesuaikan Diri',
                'variabel_id' => 5,
            ],
            [
                'id' => 13,
                'nama_indikator' => 'Kepercayaan Diri',
                'variabel_id' => 5,
            ],
            [
                'id' => 14,
                'nama_indikator' => 'Mengambil Keputusan',
                'variabel_id' => 6,
            ],
            [
                'id' => 15,
                'nama_indikator' => 'Bertanggung Jawab',
                'variabel_id' => 6,
            ],
        ];

        foreach ($indikators as $key => $indikator) {
            Indikator::create($indikator);
        }
    }
}
