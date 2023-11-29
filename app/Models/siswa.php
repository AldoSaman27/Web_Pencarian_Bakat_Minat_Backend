<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nisn',
        'nama',
        'jk',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'kelas',
       
    ];

}
