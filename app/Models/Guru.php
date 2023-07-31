<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'nama_guru',
        'jenis_kelamin',
        'tgl_lahir',
        'alamat',
        'no_telepon',
    ];

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'guru_id');
    }
}
