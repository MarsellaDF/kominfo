<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    // protected $primaryKey = 'no_register';
    public $incrementing = false;
    protected $fillable = ['no_register','id_user','nik', 'address', 'telepon', 'email', 'jobs', 'status', 'created_at', 'updated_at'];
}