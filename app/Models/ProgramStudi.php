<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    public $table = 'program_studi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_prodi'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
