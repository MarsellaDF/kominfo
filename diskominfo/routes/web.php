<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','App\Http\Controllers\HomeController@index');
Route::resource('pedoman',App\Http\Controllers\PedomanController::class);
Route::resource('dashum',App\Http\Controllers\DashumController::class);
Route::resource('tatakerja',App\Http\Controllers\TatakerjaController::class);
Route::resource('sk',App\Http\Controllers\SkController::class);
Route::resource('sop',App\Http\Controllers\SopController::class);
Route::resource('berkala',App\Http\Controllers\BerkalaController::class);
Route::resource('sesaat',App\Http\Controllers\SesaatController::class);
Route::resource('semerta',App\Http\Controllers\SemertaController::class);
Route::resource('kecuali',App\Http\Controllers\KecualiController::class);
Route::resource('langsung',App\Http\Controllers\LangsungController::class);
Route::resource('informasi',App\Http\Controllers\InformasiController::class);
Route::resource('permohonan',App\Http\Controllers\PermohonanController::class);
Route::resource('permohonan_online',App\Http\Controllers\PermohonanOnlineController::class);
Route::resource('keberatan',App\Http\Controllers\KeberatanController::class);
Route::resource('laporan',App\Http\Controllers\LaporanController::class);
Route::resource('login',App\Http\Controllers\LoginController::class);
Route::resource('ppid',App\Http\Controllers\PPIDController::class);
Route::resource('prokeg',App\Http\Controllers\ProkegController::class);
Route::resource('tentang',App\Http\Controllers\TentangController::class);
Route::resource('pejabat',App\Http\Controllers\PejabatController::class);
Route::resource('kas',App\Http\Controllers\KasController::class);
Route::resource('realisasi',App\Http\Controllers\RealisasiController::class);
Route::resource('keuangan',App\Http\Controllers\KeuanganController::class);
Route::resource('aset',App\Http\Controllers\AsetController::class);
Route::resource('dokdigital',App\Http\Controllers\DokdigitalController::class);
Route::resource('berita',App\Http\Controllers\BeritaController::class);
Route::resource('anggaran',App\Http\Controllers\AnggaranController::class);
Route::resource('neraca',App\Http\Controllers\NeracaController::class);
Route::resource('rekrutmen',App\Http\Controllers\RekrutmenController::class);
Route::resource('produkhukum',App\Http\Controllers\ProdukhukumController::class);
Route::resource('pengaduan',App\Http\Controllers\PengaduanController::class);
Route::resource('barangjasa',App\Http\Controllers\BarangjasaController::class);
Route::resource('login_pengguna',App\Http\Controllers\LoginPenggunaController::class);
Route::resource("register-pengguna", App\Http\Controllers\RegisterPenggunaController::class);
Route::resource("evakuasi", App\Http\Controllers\EvakuasiController::class);
Route::resource("maklumat", App\Http\Controllers\MaklumatController::class);
Route::resource("tujuankedudukan", App\Http\Controllers\TujuanKedudukanController::class);
Route::resource('admin',App\Http\Controllers\AdminController::class)->middleware('auth');
Route::resource('pengguna',App\Http\Controllers\PenggunaController::class)->middleware('auth');

// backend
Route::resource('banner-admin', App\Http\Controllers\BannerController::class);
Route::resource('tujuansasaran-admin',App\Http\Controllers\TujuanSasaranController::class);
Route::resource('kedudukan-admin',App\Http\Controllers\KedudukanController::class);
Route::resource('library-admin', App\Http\Controllers\LibraryController::class);
Route::resource('keanggotaan-admin', App\Http\Controllers\KeanggotaanController::class);
Route::resource('adminlangsung-admin', App\Http\Controllers\AdminLangsungController::class);
Route::resource('adminpermohonan-admin', App\Http\Controllers\AdminPermohonanController::class);
Route::resource('adminkeberatan-admin', App\Http\Controllers\AdminKeberatanController::class);
Route::resource('adminlaporan-admin', App\Http\Controllers\AdminLaporanController::class);
Route::resource('adminberkala-admin', App\Http\Controllers\AdminBerkalaController::class);
Route::resource('adminsesaat-admin', App\Http\Controllers\AdminSesaatController::class);
Route::resource('adminsemerta-admin', App\Http\Controllers\AdminSemertaController::class);
Route::resource('adminkecuali-admin', App\Http\Controllers\AdminKecualiController::class);
Route::resource('adminpedoman-admin', App\Http\Controllers\AdminPedomanController::class);
Route::resource('admindashum-admin', App\Http\Controllers\AdminDashumController::class);
Route::resource('adminsk-admin', App\Http\Controllers\AdminSkController::class);
Route::resource('adminsop-admin', App\Http\Controllers\AdminSopController::class);
Route::resource('adminppid-admin',App\Http\Controllers\AdminPPIDController::class);
Route::resource('admintentang-admin',App\Http\Controllers\AdminTentangController::class);
Route::resource('adminpejabat-admin',App\Http\Controllers\AdminPejabatController::class);
Route::resource('admintatakerja-admin', App\Http\Controllers\AdminTatakerjaController::class);
Route::resource('adminprokeg-admin',App\Http\Controllers\AdminProkegController::class);
Route::resource('adminrealisasi-admin',App\Http\Controllers\AdminRealisasiController::class);
Route::resource('adminkeuangan-admin',App\Http\Controllers\AdminKeuanganController::class);
Route::resource('adminaset-admin',App\Http\Controllers\AdminAsetController::class);
Route::resource('admindokdigital-admin',App\Http\Controllers\AdminDokdigitalController::class);
Route::resource('adminberita-admin',App\Http\Controllers\AdminBeritaController::class);
Route::resource('adminrekrutmen-admin',App\Http\Controllers\AdminRekrutmenController::class);
Route::resource('adminprodukhukum-admin',App\Http\Controllers\AdminProdukhukumController::class);
Route::resource('adminpengaduan-admin',App\Http\Controllers\AdminPengaduanController::class);
Route::resource('adminbarangjasa-admin',App\Http\Controllers\AdminBarangjasaController::class);
Route::resource('adminevakuasi-admin',App\Http\Controllers\AdminEvakuasiController::class);
Route::resource('adminmaklumat-admin',App\Http\Controllers\AdminMaklumatController::class);
Route::resource('adminanggaran-admin',App\Http\Controllers\AdminAnggaranController::class);
Route::resource('adminneraca-admin',App\Http\Controllers\AdminNeracaController::class);
Route::resource('adminkas-admin',App\Http\Controllers\AdminKasController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
