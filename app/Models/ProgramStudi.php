<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;
    protected $table = 'program_studi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','nama_prodi'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
