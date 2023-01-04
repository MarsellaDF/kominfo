<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KedudukanSeeder extends Seeder
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
                'title' => 'Kedudukan',
                'content' => '<p><i class="far fa-check-circle text-primary me-3"></i>Kedudukan</p>
                <p>Dinas Komunikasi, Informatika dan Persandian merupakan unsur pelaksana Urusan Pemerintahan bidang Komunikasi dan Informatika, Persandian, dan Statistik yang menjadi kewenangan daerah yang berkedudukan di bawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Tugas</p>
                <p>Dinas Komunikasi, Informatika dan Persandian mempunyai tugas membantu Bupati melaksanakan Urusan Pemerintahan di bidang Komunikasi dan Informatika, Persandian, dan Statistik yang menjadi kewenangan daerah dan tugas pembantuan yang diberikan kepada kabupaten.</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Fungsi</p>
                <p>Dinas Komunikasi, Informatika dan Persandian menyelenggarakan fungsi:</p>
                   1. perumusan kebijakan teknis dibidang komunikasi dan informatika, persandian, dan statistik;</br>
                   2. pelaksanaan kebijakan teknis dibidang komunikasi dan Informatika, persandian, dan statistik;</br>
                   3. pelaksanaan evaluasi dan pelaporan dibibidang komunikasi dan Informatika, persandian, dan statistik;</br>
                   4. pelaksanaan administrasi dinas sesuai dengan lingkup tugasnya; dan</br>
                   5. pelaksanaan fungsi lain yang diberikan oleh Bupati sesuai dengan tugas dan fungsinya.</p>',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('kedudukans')->insert($posts);
    }
}
