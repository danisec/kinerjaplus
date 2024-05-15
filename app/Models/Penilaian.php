<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $guarded = ['id_penilaian'];
    protected $primaryKey = 'id_penilaian';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('alternatifPertama.alternatifPertama', function ($query) use ($search) {
                    $query->where('nama_alternatif', 'like', '%' . $search . '%');
                })->orWhereHas('alternatifKedua.alternatifPertama', function ($query) use ($search) {
                    $query->where('nama_alternatif', 'like', '%' . $search . '%');
                })->orWhere('tahun_ajaran', 'like', '%' . $search . '%');
            });
        });
    }

    public function penilaianIndikator()
    {
        return $this->hasMany(PenilaianIndikator::class, 'id_penilaian', 'id_penilaian');
    }

    public function catatanKaryawan()
    {
        return $this->belongsTo(CatatanKaryawan::class, 'id_penilaian', 'id_penilaian');
    }

    public function alternatifPertama()
    {
        return $this->belongsTo(GroupPenilaian::class, 'alternatif_pertama', 'alternatif_pertama');
    }

    public function alternatifKedua()
    {
        return $this->belongsTo(GroupPenilaian::class, 'alternatif_kedua', 'alternatif_pertama');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
}
