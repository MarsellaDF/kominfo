<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminDashumSeeder extends Seeder
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
                'title' => 'Dasar Hukum Pembentukan',
                'content' => '<p>I. PERATURAN YANG MENDASARI PEMBENTUKAN PPID:</p>
                <div class="text-justify mx-auto mb-2" style="text-indent: 50px">
                    <p>1. UNDANG-UNDANG RI NO. 14 /2008 TENTANG KETERBUKAAN INFORMASI PUBLIK</p>
                    <p>2. PERATURAN PEMERINTAH RI NO. 61 /2010 TENTANG PELAKSANAAN UNDANG-UNDANG NO 14 /2008</p>
                    <p>3. PERATURAN KOMISI INFORMASI NO. 1 / 2010 TENTANG STANDAR LAYANAN INFORMASI PUBLIK</p>
                    <p>4. PERATURAN MENTERI DALAM NEGERI NO. 2 /2010 TENTANG PEDOMAN PENGELOLAAN PELAYANAN INFORMASI DAN
                        DOKUMENTASI </P>
                    <p>DI LINGKUNGAN KEMENTERIAN DALAM NEGERI</p>
                    <P>5. PERATURAN MENTERI KOMUNIKASI DAN INFORMATIKA NO. 10 / 2010 TENTANG PEDOMAN PENGELOLAAN PELAYANAN
                        INFORMASI DAN </p>
                    <p> DOKUMENTASI DI LINGKUNGAN KEMENTERIAN KOMUNIKASI DAN INFORMATIKA</p>
                </div>
                <p>II. PERATURAN YANG MENDASARI PEMBENTUKAN PPID KABUPATEN BANYUWANGI:</p>
                <div class="text-justify mx-auto mb-2" style="text-indent: 50px">
                    <p>1. SURAT KEPUTUSAN BUPATI NOMOR : 199/511/KEP/429.011/2012 TENTANG PEMBENTUKAN TIM PENYUSUNAN RANCANGAN
                        PERATURAN </P>
                    <p> BUPATI TENTANG PEDOMAN PENGELOLAAN PELAYANAN INFORMASI DAN DOKUMENTASI DI KABUPATEN BANYUWANGI</p>
                    <p>2. PERATURAN BUPATI BANYUWANGI NOMOR 19 THN 2012 TANGGAL 25 JUNI 2012 Tentang PEDOMAN PELAYANAN INFORMASI
                        DAN </P>
                    <p> DOKUMENTASI DI LINGKUNGAN PEMERINTAH KABUPATEN BANYUWANGI</p>
                </div>
                <p>III. PERATURAN YANG MENDASARI PEMBENTUKAN PPID PEMBANTU DISKOMINFO DAN PERSANDIAN KABUPATEN BANYUWANGI:</p>
                <div class="text-justify mx-auto mb-2" style="text-indent: 50px">
                    <p>1. KEPUTUSAN KEPALA DINAS KOMINFO DAN PERSANDIAN KABUPATEN BANYUWANGI NOMOR : 891/169/429.118/2017</P>
                    <p>Tentang : Pejabat Pengelola Informasi dan Dokumentasi (PPID) pembantu pada KOMUNIKASI, INFORMATIKA DAN
                        PERSANDIAN KABUPATEN </P>
                    <p>BANYUWANGI</p>
                    <p>2. KEPUTUSAN KEPALA DINAS KOMINFO DAN PERSANDIAN KABUPATEN BANYUWANGI NOMOR : 118/11/KEP/429.116/2020</P>
                    <p> Tentang : Pejabat Pengelola Informasi dan Dokumentasi (PPID) pembantu pada Dinas Komunikasi, Informatika
                        dan Persandian Kabupaten</p>
                    <p> Banyuwangi</p>',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('admin_dashums')->insert($posts);
    }
}