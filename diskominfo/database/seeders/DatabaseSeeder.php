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
        $this->call([
            LibrarySeeder::class,
            AdminLangsungSeeder::class,
            AdminDashumSeeder::class,
            AdminTentangSeeder::class,
            TujuanSasaranSeeder::class,
            KedudukanSeeder::class,
        ]);
    }
}