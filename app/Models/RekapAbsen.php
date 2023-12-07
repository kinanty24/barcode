<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapAbsen extends Model
{
    use HasFactory;

    protected $table = 'rekap_absen';

    protected $fillable = ['id_mahasiswa', 'id_dosen', 'created_at', 'updated_at', 'tanggal'];


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id');
    }
}
