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
                'id' => 1,
                'wali_kelas_id' => 1,
                'nama_kelas' => 'IX - A',
            ],
        ];

        foreach ($kelas as $key => $k) {
            Kelas::create($k);
        }
    }
}
