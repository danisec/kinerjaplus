<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganAlternatif extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_alternatif';
    protected $guarded = ['id_perhitungan_alternatif'];

    public function tanggalPenilaian()
    {
        return $this->belongsTo(TanggalPenilaian::class, 'id_tanggal_penilaian', 'id_tanggal_penilaian');
    }

    public function alternatifPertama()
    {
        return $this->belongsTo(GroupKaryawanDetail::class, 'alternatif_pertama', 'kode_alternatif');
    }

    public function alternatifKedua()
    {
        return $this->belongsTo(GroupKaryawanDetail::class, 'alternatif_kedua', 'kode_alternatif');
    }
}
