<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masyarakat extends Model
{
    use HasFactory;

    // Daftar kolom yang diizinkan untuk diisi (Mass Assignment)
    protected $fillable = [
        'nomor_kk', 
        'nomor_ktp', 
        'nama', 
        'alamat', 
        'jenis_kelamin'
    ];
}