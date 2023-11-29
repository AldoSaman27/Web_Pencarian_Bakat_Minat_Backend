<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BakatMinat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_siswa',
        'id_kesenian',
        'id_kat_kesenian',
        'id_olahraga',
        'id_kat_olahraga',
        'id_pres_kesenian',
        'id_pres_olahraga',
        'id_organisasi',
        'no_wa_siswa',
        'no_wa_ortu',
        'tinggi_badan',
        'berat_badan',
        'ukuran_baju',
        'karya_ilmiah',
        'alamat_lengkap',
        'jarak_kesekolah',
        'alat_transportasi',

    ];
}
