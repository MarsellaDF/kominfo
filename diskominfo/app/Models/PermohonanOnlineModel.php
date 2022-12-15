<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanOnlineModel extends Model
{
    use HasFactory;
    protected $table = 'permohonan_online_models';
    protected $fillable = [
    'nik',
    'nama',
    'alamat',
    'email',
    'pekerjaan',
    'nomor',
    'informasi',
    'alasan_tujuan',
    'cara',
    'ktp',
    ];
}
