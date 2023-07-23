<?php

namespace Database\Seeders;

use App\Models\WaliKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateWaliKelasSeeder extends Seeder
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
                'user_id' => 2,
                'nip' => '123456789',
                'nama_depan' => 'Wali',
                'nama_belakang' => 'Kelas 1',
                'tanggal_lahir' => '2002-07-14',
                'tempat_lahir' => 'Sidoarjo',
                'jenis_kelamin' => 'L',
                'telp' => '083872287654',
                'email' => 'walas1@gmail.com',
                'alamat' => 'Bendotretek 02/01',
                'provinsi' => 'Jawa Timur',
                'kabupaten' => 'Sidoarjo',
                'kecamatan' => 'Prambon',
                'desa' => 'Bendotretek',
                'kode_pos' => '61264',
            ],
            [
                'user_id' => 3,
                'nip' => '123456789',
                'nama_depan' => 'Wali',
                'nama_belakang' => 'Kelas 2',
                'tanggal_lahir' => '2002-07-14',
                'tempat_lahir' => 'Sidoarjo',
                'jenis_kelamin' => 'L',
                'telp' => '083872287654',
                'email' => 'walas2@gmail.com',
                'alamat' => 'Bendotretek 02/01',
                'provinsi' => 'Jawa Timur',
                'kabupaten' => 'Sidoarjo',
                'kecamatan' => 'Prambon',
                'desa' => 'Bendotretek',
                'kode_pos' => '61264',
            ]
        ];

        foreach ($waliKelas as $key => $walas) {
            WaliKelas::create($walas);
        }
    }
}
