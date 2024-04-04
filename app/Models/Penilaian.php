<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $guarded = ['id_penilaian'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('alternatifPertama', function ($query) use ($search) {
                    $query->where('nama_alternatif', 'like', '%' . $search . '%');
                })->orWhereHas('alternatifKedua', function ($query) use ($search) {
                    $query->where('nama_alternatif', 'like', '%' . $search . '%');
                })->orWhere('tahun_ajaran', 'like', '%' . $search . '%');
            });
        });
    }

    public function penilaianIndikator()
    {
        return $this->hasMany(PenilaianIndikator::class, 'id_penilaian', 'id_penilaian');
    }

    public function alternatifPertama()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_pertama', 'kode_alternatif');
    }

    public function alternatifKedua()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_kedua', 'kode_alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
}
