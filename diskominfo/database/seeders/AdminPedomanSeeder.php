<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPedomanSeeder extends Seeder
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
                'title' => 'Latar Belakang',
                'content' => '<p>Reformasi yang bergulir pada tahun 1998 yang ditandai dengan 3(tiga) tuntutan yaitu; demokratisasi, tranparasi dan supremasi hukum & HAM, telah membawa perubahan mendasar dalam kehidupan bermasyarakat, berbangsa dan benegara. Konsekuensi dari tuntutan reformasi tersebut salah satu diantaranya adalah ditetapkannya UU N0.14 tahun 2008 tentang Keterbukaan Informasi Publik yang bertujuan untuk mewujudkan tata kelola pemerintahan yang baik dan bertanggungjawab (good governance) melalui penerapan prinsip-prinsip akuntabilitas, transparansi dan supremasi hukum serta melibatkan partisipasi masyarakat dalam setiap proses kebijakan publik.</p>
                <p class="mb-4">Dalam proses keterlibatan masyarakat perlu diakomodasikan dengan cara mempermudah jaminan akses informasi publik berdasarkan pedoman pengelolaan informasi dan dokumentasi. Dalam kaitan ini, pengelolaan informasi dan dokumentasi publik diharapkan tidak sampai mengganggu prinsip kehati-hatian dalam menjaga kelangsungan kehidupan berbangsa dan bernegara untuk kepentingan yang lebih luas.</p>
                <p class="mb-4">Penerapan prinsip-prinsip good governance ini pada dasarnya sangat tergantung pada persiapan masing-masing Kementerian Komunikasi dan Informatika dalam mengelola informasi dan dokumentasi bagi masyarakat. Untuk itu, sebagai upaya menyamakan persepsi dalam menciptakan dan menjamin kelancaraan dalam pelayanan informasi publik, maka disusun Pedoman Pengelolaan Informasi dan Dokumentasi di lingkungan Kementerian Komunikasi dan Informatika.</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Maksud</p>
                <p>Pedoman pengelolaan Informasi dan Dokumentasi di lingkungan Kementerian Komunikasi dan Informatika dimaksudkan sebagai acuan bagi setiap Satuan Kerja dalam penyediaan, pengumpulan, pendokumentasian dan pelayanan, serta penetapan Pejabat Pengelola Informasi dan Dokumentasi.</p>
                <p><i class="far fa-check-circle text-primary me-3"></i>Tujuan</p>
                <p>a. Masing-masing Satuan Kerja mampu menyediakan, mengumpulkan, mendokumentasikan dan menyampaikan informasi tentang kegiatan dan produk unit kerjanya secara akurat dan tidak menyesatkan;<br>
                    b. Satuan Kerja mampu menyediakan, mengumpulkan, mendokumentasikan dan menyampaikan bahan dan produk informasi secara cepat dan tepat waktu;<br>
                    c. Pejabat Pengelola Informasi dan Dokumentasi mampu memberikan pelayanan informasi secara cepat dan tepat waktu dengan biaya ringan dan cara sederhana.</p>',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Susunan Keanggotaan PPID',
                'content' => '<table class="table1">
                <tr>
                    <td>Atasan PPID</td>
                    <td>Budi Santoso</td>
                    <td>Kepala Dinas Komunikasi, Informatika dan Persandian Kabupaten Banyuwangi</td>
                </tr>
                <tr>
                    <td>Ketua</td>
                    <td>Abin Hidayat</td>
                    <td>Sekretaris Dinas Komunikasi, Informatika dan Persandian Kabupaten Banyuwangi</td>
                </tr>
                <tr>
                    <td>Sekretaris<br>
                        - Pengelola Sekretariat<br>
                        - Anggota</td>
                    <td>Rahmawati Setyoardini<br>
                        Hj. Ermi Rossana<br>
                        1. Moh. Arif Fajartono<br>
                        2. Hendy Fatkhurochman<br>
                        3. Prastiyo<br>
                        4. Nur Hidayati<br>
                        5. Rif\'atul Husnia</td>
                    <td>Kepala Bidang Informasi dan Komunikasi Publik Kasi Dokumentasi dan Pemberitaan<br>
                        Staf<br>
                        Staf<br>
                        Staf<br>
                        Staf<br>
                        Staf<br>
                        Staf</td>
                </tr>
                <tr>
                    <td>Bidang - Bidang<br>
                        a. Ketua Bidang Pelayanan dan Dokumentasi Informasi<br>
                        - Pengelola Publikasi<br>
                        - Anggota<br></br>
                        b. Ketua Bidang Pengolah Data dan Klasifikasi Informasi<br>
                        - Pengelola Data<br>
                        - Anggota<br>
                        c. Ketua Bidang Penyelesaian Sengketa Informasi<br>
                        - Anggota (Pengelola Penyelesaian Sengketa)</td>
                    <td>Agustinus Suko Basuki<br>
                        1. Sumber Hari Hartono<br>
                        2. Ririn Handajati<br>
                        3. Faridhatis Salmi<br>
                        4. Wahyu Priyanto<br></br>
                        Tri Jatmiko<br>
                        1. Arif Fauzi<br>
                        2. Joni Priyanto<br>
                        3. Moh. Zainur Rofik<br>
                        4. Niluh Sari Kurnia Pratiwi<br></br>
                        Hj. Sujarmi<br>
                        1. Nafi Feridian<br>
                        2. Edy Fakhrurahman Hamid<br>
                        3. Windy Sindu Pradana<br>
                        4. R. Arief Budi Santoso</td>
                    <td>Kepala Bidang Teknologi Informatika<br>
                        Kasi Aplikasi dan Tata Kelola Teknologi Informatika<br>
                        Kasubbag Penyusunan Program<br>
                        Staf<br>
                        Staf<br></br>
                        Kepala Bidang Statistik dan Persandian<br>
                        Kasi Infrastuktur Teknologi Informatika<br>
                        Kasi Persandian<br>
                        Staf<br>
                        Staf<br></br>
                        Kasubbag Umum dan Keuangan<br>
                        Kasi Komunikasi Publik<br>
                        Kasi Informasi Publik<br>
                        Staf<br>
                        Staf<br></br>
                </tr>
            </table>',
            'status' => true,
            'created_at' => now(),
            ],
        ];

        DB::table('admin_pedomen')->insert($posts);
    }
}
