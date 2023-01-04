<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TujuanSasaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'Tujuan Sasaran',
                'content' => '<p><i class="far fa-check-circle text-primary me-3"></i>Tujuan</p>
                <p>“Meningkatkan Kepuasan Masyarakat Terhadap Pelayanan Publik”</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Sasaran</p>
                <p>“Meningkatnya Tata Kelola Pemerintahan yang berorientasi Pada Layanan sampai Desa”',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('tujuan_sasarans')->insert($posts);
    }
}