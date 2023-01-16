<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuankeberatan extends Model
{
    use HasFactory;
    protected $table = 'pengajuankeberatans';
    protected $fillable = [
    'tujuan',
    'nama1',
    'alamat1',
    'pekerjaan',
    'nomor1',
    'nama2',
    'alamat2',
    'nomor2',
    'alasan',
    ];
}