<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalpelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'mapel',
        'nama_guru',
        'ruang_kelas',
        'waktu_mulai',
        'waktu_selesai',
        'tanggal',
    ];
}
