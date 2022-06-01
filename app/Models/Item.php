<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','nama_item'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}