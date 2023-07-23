<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $waliKelas = [
            [
                'kelas_id' => 1,
                'user_id' => 1,
                'nama_depan' => 'Siswa',
                'nama_belakang' => '1',
                'nisn' => 123456,
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2001-01-01',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'anak_ke' => '2,3',
                'nama_orang_tua' => 'Alex',
                'pekerjaan_orang_tua' => 'Swasta',
                'telp' => '083123456789',
                'alamat' => 'Surabya',
                'tanggal_masuk' => '2023-06-02',
                'status' => 1,
            ],
            [
                'kelas_id' => 2,
                'user_id' => 5,
                'nama_depan' => 'Siswa',
                'nama_belakang' => '2',
                'nisn' => 123456,
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2001-01-01',
                'jenis_kelamin' => 'L',
                'agama' => 'Islam',
                'anak_ke' => '2,3',
                'nama_orang_tua' => 'Alex',
                'pekerjaan_orang_tua' => 'Swasta',
                'telp' => '083123456789',
                'alamat' => 'Surabya',
                'tanggal_masuk' => '2023-06-02',
                'status' => 1,
            ],
        ];

        foreach ($waliKelas as $key => $walas) {
            Siswa::create($walas);
        }
    }
}
