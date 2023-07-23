<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Siswa 1',
                'email' => 'siswa1@gmail.com',
                'role' => 0,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Wali Kelas 1',
                'email' => 'walas1@gmail.com',
                'role' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Wali Kelas 2',
                'email' => 'walas2@gmail.com',
                'role' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Siswa 2',
                'email' => 'siswa2@gmail.com',
                'role' => 0,
                'password' => bcrypt('123456'),
            ],

        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
