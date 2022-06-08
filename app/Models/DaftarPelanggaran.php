<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPelanggaran extends Model
{
    use HasFactory;
    protected $table = 'daftar_pelanggaran';
    protected $fillable = [
        'id_mahasiswa', 'id_pelanggaran', 'id_user', 'id_item', 'foto'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'id_mahasiswa');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id', 'id_user');
    }

    public function pelanggaran()
    {
        return $this->hasOne(Pelanggaran::class,'id', 'id_pelanggaran');
    }
    
    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'id_item');
    }
}
