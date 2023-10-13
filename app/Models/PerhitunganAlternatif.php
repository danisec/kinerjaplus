<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganAlternatif extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_alternatif';
    protected $guarded = ['id_perhitungan_alternatif'];

    public function alternatifPertama()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_pertama', 'kode_alternatif');
    }

    public function alternatifKedua()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_kedua', 'kode_alternatif');
    }
}
