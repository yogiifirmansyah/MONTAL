<?php

namespace Database\Seeders;

use App\Models\Variabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateVariabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variabels = [
            [
                'id' => 1,
                'nama_variabel' => 'Bimbingan Fisik',
            ],
            [
                'id' => 2,
                'nama_variabel' => 'Bimbingan Mental',
            ],
            [
                'id' => 3,
                'nama_variabel' => 'Bimbingan Sosial',
            ],
            [
                'id' => 4,
                'nama_variabel' => 'Kemandirian Emosional',
            ],
            [
                'id' => 5,
                'nama_variabel' => 'Kemandirian Perilaku',
            ],
            [
                'id' => 6,
                'nama_variabel' => 'Kemandirian Nilai',
            ],

        ];

        foreach ($variabels as $key => $variabel) {
            Variabel::create($variabel);
        }
    }
}
