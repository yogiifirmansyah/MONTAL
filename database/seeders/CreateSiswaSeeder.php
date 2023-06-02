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
                'nama_depan' => 'Leo',
                'nama_belakang' => 'Messi',
                'nisn' => 123456,
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2001-01-01',
                'jenis_kelamin' => 'L',
                'nama_orang_tua' => 'Alex',
                'telp' => '083123456789',
                'alamat' => 'Surabya',
                'tanggal_masuk' => '2023-06-02',
                'status' => 1,
            ],
            [
                'kelas_id' => 1,
                'nama_depan' => 'Cristiano',
                'nama_belakang' => 'Ronaldo',
                'nisn' => 123456,
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2001-01-01',
                'jenis_kelamin' => 'L',
                'nama_orang_tua' => 'Alex',
                'telp' => '083123456789',
                'alamat' => 'Surabya',
                'tanggal_masuk' => '2023-06-02',
                'status' => 1,
            ],
            [
                'kelas_id' => 1,
                'nama_depan' => 'Robert',
                'nama_belakang' => 'Lewandoski',
                'nisn' => 123456,
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2001-01-01',
                'jenis_kelamin' => 'L',
                'nama_orang_tua' => 'Alex',
                'telp' => '083123456789',
                'alamat' => 'Surabya',
                'tanggal_masuk' => '2023-06-02',
                'status' => 1,
            ]
        ];

        foreach ($waliKelas as $key => $walas) {
            Siswa::create($walas);
        }
    }
}
