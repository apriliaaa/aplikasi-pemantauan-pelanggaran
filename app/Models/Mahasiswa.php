<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    public $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'nim', 'id_prodi'
    ];

    public function daftar_pelanggaran()
    {
        return $this->belongsToMany(DaftarPelanggaran::class);
    }

    // public function pelanggaran(){
    //     return $this->belongsToMany(Pelanggaran::class, 'detail_pelanggaran');
    // }

    // public function user()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function user()
    // {
    //     return $this->belongsToMany(User::class, 'id_user');
    // }

    // public function pelanggaran()
    // {
    //     return $this->belongsToMany(Pelanggaran::class, 'id_pelanggaran');
    // }

    // public function item()
    // {
    //     return $this->hasMany(Item::class, 'id_item');
    // }

    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class, 'id_prodi');
    }
}
