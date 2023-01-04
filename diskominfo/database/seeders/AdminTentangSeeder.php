<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTentangSeeder extends Seeder
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
                'title' => 'Sejarah',
                'content' => 'Pada mulanya sejak tahun 2011, urusan pemerintahan di bidang komunikasi dan Informatika di lingkungan Pemerintah Kabupaten Banyuwangi dilaksanakan oleh Dinas Perhubungan, Komunikasi dan Informatika Kabupaten Banyuwangi sampai dengan tahun 2016.
                Seiring waktu terjadilah dinamika perubahan perangkat daerah di Kabupaten Banyuwangi, pada tahun 2016 dibentuklah Dinas Komunikasi Informatika dan Persandian Kabupaten Banyuwangi dengan Peraturan Daerah Kabupaten Banyuwangi (Perda) nomor 8 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Banyuwangi.
                Sebagai peraturan pelaksanaan dari perda tersebut, Bupati Banyuwangi lalu menerbitkan Peraturan Bupati Banyuwangi (Perbup) nomor 49 Tahun 2016 tentang Kedudukan Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Dinas Komunikasi, Informatika dan Persandian Kabupaten Banyuwangi yang ditandatangani pada tanggal 30 Oktober 2016.
                Peraturan Bupati tersebut mulai berlaku efektif sejak tanggal 1 Januari 2017. Pada saat itu, struktur di bawah Kepala Dinas terdapat Sekretariat dan tiga bidang diantaranya; Bidang Komunikasi, Bidang Teknologi Informatika, Bidang Statistik dan Persandian. <br></br>
                Tahun 2020, Perda nomor 8 Tahun 2016 diubah dengan Peraturan Daerah Kabupaten Banyuwangi nomor 10 Tahun 2019 sehingga berdampak diterbitkannya Peraturan Bupati Banyuwangi nomor 6 Tahun 2020 tentang Perubahan atas Peraturan Bupati Banyuwangi nomor 49 Tahun 2016 Tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Tata Kerja Dinas Komunikasi Informatika dan Persandian Kabupaten Banyuwangi.
                Perbup nomor 6 Tahun 2020 pada prinsipnya mengubah Bidang Komunikasi menjadi Bidang Informasi dan Komunikasi Publik yang membawahi tiga seksi di antaranya Seksi Informasi Publik, Seksi Komunikasi Publik, Seksi Dokumentasi dan Pemberitaan. Sedangkan struktur bidang yang lain tidak mengalami perubahan.
                Kemudian, pada tahun 2021 terdapat perubahan yang dipicu terbitnya Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi nomor 25 Tahun 2021 tentang Penyederhanaan Struktur Organisasi pada Instansi Pemerintah. Perubahan itu mencakup disetarakannya jabatan eselon IV ke dalam jabatan fungsional.
                Struktur baru tersebut diatur dalam Peraturan Bupati Banyuwangi nomor 68 Tahun 2021 tentang Kedudukan, Susunan Organisasi Tugas dan Fungsi serta Tata Kerja Dinas Komunikasi, Informatika dan Persandian Kabupaten Banyuwangi yang ditandatangani oleh Bupati Banyuwangi, Ipuk Fiestiandani Azwar Anas pada tanggal 31 Desember 2021.
                Struktur bidang tidak mengalami perubahan, hanya saja nomenklatur seksi diubah istilahnya menjadi Sub Koordinator yang dipimpin oleh pejabat fungsional ahli muda. Adapun jabatan structural eselon IV di bawah Sekretariat masih dipertahankan keberadaannya yaitu Sub Bagian Umum dan Keuangan, Sub Bagian Penyusunan Program.',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Ruang Lingkup',
                'content' => 'Dinas Komunikasi, Informatika dan Persandian merupakan Dinas Tipe B yang melaksanakan urusan pemerintahan bidang komunikasi dan informatika, bidang statistik dan bidang persandian.',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Visi Misi',
                'content' => 'Visi<br>
                “Terwujudnya Banyuwangi yang Semakin Maju, Sejahtera, dan Berkah” <br><br>
                Misi<br>
                “Membangun Layanan Publik dan Tatakelola Pemerintahan yang Inovatif dan Dinamis”',
                'status' => true,
                'created_at' => now(),
            ],
        ];
        DB::table('admin_tentangs')->insert($posts);
    }
}