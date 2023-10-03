<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganKriteria extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_kriteria';
    protected $guarded = ['id_perhitungan_kriteria'];

    public function kriteriaPertama()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_pertama', 'kode_kriteria');
    }

    public function kriteriaKedua()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_kedua', 'kode_kriteria');
    }
}
