<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_pelanggaran'
    ];

    public function daftar_pelanggaran(){
        return $this->belongsToMany(DaftarPelanggaran::class);
    }

    // public function mahasiswa(){
    //     return $this->belongsToMany(Mahasiswa::class);
    // }

    // public function mahasiswa()
    // {
    //     return $this->belongsToMany(Mahasiswa::class, 'table_pelanggaran');
    // }
}
