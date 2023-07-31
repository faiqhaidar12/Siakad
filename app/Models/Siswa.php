<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = [
        'nama_siswa',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_telepon_orang_tua',
        'kelas_id'
    ];

    public function kelasList()
    {
        return Kelas::pluck('nama_kelas', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
