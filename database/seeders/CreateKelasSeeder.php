<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'wali_kelas_id' => 1,
                'nama_kelas' => 'A',
            ],
            [
                'wali_kelas_id' => 2,
                'nama_kelas' => 'B',
            ],
        ];

        foreach ($kelas as $key => $k) {
            Kelas::create($k);
        }
    }
}
