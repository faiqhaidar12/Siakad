<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'kelas_id',
        'nilai'
    ];

    public static function getSiswaByKelas($kelas_id)
    {
        $siswaList = Siswa::where('kelas_id', $kelas_id)->pluck('nama_siswa', 'id');
        return $siswaList;
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // public function siswaList()
    // {
    //     return Siswa::pluck('nama_siswa', 'id');
    // }

    // public function mapelList()
    // {
    //     return Mapel::pluck('nama_mapel', 'id');
    // }

    // public function kelasList()
    // {
    //     return Kelas::pluck('nama_kelas', 'id');
    // }
}
