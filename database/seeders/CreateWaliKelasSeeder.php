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
                'nama_depan' => 'Moch Yogi',
                'nama_belakang' => 'Firmansyah',
                'tanggal_lahir' => '2002-07-14',
                'tempat_lahir' => 'Sidoarjo',
                'jenis_kelamin' => 'L',
                'telp' => '083872287654',
                'email' => 'walas@gmail.com',
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
