<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanKaryawan extends Model
{
    use HasFactory;

    protected $table = 'catatan_karyawan';
    protected $guarded = ['id_catatan_karyawan'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('penilaian.alternatifPertama.alternatifPertama', function ($query) use ($search) {
                    $query->where('nama_alternatif', 'like', '%' . $search . '%');
                })->orWhereHas('penilaian.alternatifKedua.alternatifPertama', function ($query) use ($search) {
                    $query->where('nama_alternatif', 'like', '%' . $search . '%');
                })->orWhere('tahun_ajaran', 'like', '%' . $search . '%');
            });
        });
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'id_penilaian', 'id_penilaian');
    }
}
