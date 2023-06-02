<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateUserSeeder::class);
        $this->call(CreateWaliKelasSeeder::class);
        $this->call(CreateKelasSeeder::class);
        $this->call(CreateSiswaSeeder::class);
        $this->call(CreateVariabelSeeder::class);
        $this->call(CreateIndikatorSeeder::class);
    }
}
