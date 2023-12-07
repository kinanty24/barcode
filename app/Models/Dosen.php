<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "data_dosen";
    protected $fillable = [
        'nama',
        'nidn',
        'user_id',
        'id_matkul',
        'days',
        'start',
        'end',
        'barcode',
        'ttl',
        'agama',
        'jk',
        'alamat',

    ];


    const Days = [
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul', 'id');
    }
}
