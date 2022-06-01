<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'nim', 'id_user', 
        'id_pelanggaran', 'id_item', 'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class, 'id_pelanggaran');
    }

    public function item()
    {
        return $this->hasMany(Item::class, 'id_item');
    }
}
