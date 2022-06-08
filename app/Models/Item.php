<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $table = 'item';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_item'
    ];

    public function daftar_pelanggaran()
    {
        return $this->belongsToMany(DaftarPelanggaran::class);
    }

    // public function mahasiswa()
    // {
    //     return $this->belongsTo(Mahasiswa::class);
    // }
}
