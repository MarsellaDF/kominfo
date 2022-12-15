<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminLangsungSeeder extends Seeder
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
                'title' => 'Mekanisme Permohonan Informasi Publik',
                'content' => '1. Pemohon informasi datang ke tempat layanan informasi mengisi formulir permintaan informasi dengan melampirkan
                foto copy KTP pemohon dan pengguna informasi, bagi lembaga dilengkapi foto copy akta pendirian, surat keterangan
                terdaftar di Kominfo Kabupatem Banyuwangi.<br>
                2. Maksud dan tujuan permintaan informasi harus jelas penggunaannnya.<br>
                3. Petugas memberi tanda bukti penerimaan permintaan informasi publik. kepada pemohon informasi publik.<br>
                4. Petugas memproses permintaan pemohon informasi publik sesuai dengan formulir permintaan informasi publik yang
                telah ditandatangani oleh pemohon informasi publik.<br>
                5. Petugas menyerahkan informasi sesuai dengan yang diminta oleh pemohon/pengguna informasi. Jika informasi yang
                diminta masuk dalam kategori dikecualikan, PPID menyampaikan alasan sesuai dengan keterangan perundangan yang
                berlaku.<br>
                6. Petugas memberikan Tanda bukti Penyerahan informasi Publik kepada pengguna informasi publik.<br>
                7. Membukukan dan mencatat.',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Jangka Waktu Penyelesaian',
                'content' => '1. Proses penyelesaian untuk memenuhi permintaan pemohon informasi publik dilakukan setelah pemohon informasi
                memenuhi persyaratan yang telah ditentukan.<br>
                2. Waktu penyelesaian dilaksanakan paling lambat 10 (sepuluh ) hari sejak diterima permintaan Pejabat Pengelola
                Informasi dan Dokumentasi (PPID) akan menyampaikan pemberitahuan yang berisikan
                informasi yang diminta berada dibawah penguasaannya atau tidak. Dan PPID dapat memperpanjang waktu paling lambat 14
                (empat belas) hari kerja.<br>
                3. Penyampaian/pendistribusian/penyerahan informasi publik kepada pemohon informasi publik dilakukan secara
                langsung, dengan menandatangani berita acara penerimaan informasi publik.<br>
                4. Jika permohonan informasi diterima, maka dalam surat pemberitahuan juga dicantumkan materi informasi yang
                diberikan, format informasi, apakah dalam bentuk softcopy atau data tertulis.
                Apabila dibutuhkan untuk keperluan penggandaan menjadi tanggung jawab atau beban pemohon informasi. Bila permintaan
                informasi ditolak, maka dalam surat pemberitahuan dicantumkan alasan penolakan.',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'title' => 'Biaya/Tarif',
                'content' => 'Pejabat Pengelola Informasi dan Dokumentasi menyediakan informasi publik secara gratis (tidak dipungut biaya),
                sedangkan untuk penggandaan, pemohon/pengguna informasi publik dapat melakukan penggandaan/fotocopy sendiri di
                sekitar gedung Dinas Kominfo Prov Jatim atau biaya penggandaan ditanggung oleh pemohon informasi.',
                'status' => true,
                'created_at' => now(),
            ],
        ];

        DB::table('admin_langsungs')->insert($posts);
    }
}