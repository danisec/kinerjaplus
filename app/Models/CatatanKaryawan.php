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
                $query->whereHas('alternatif', function ($query) use ($search) {
                    $query->where('nama_alternatif', 'like', '%' . $search . '%');
                })->orWhere('tahun_ajaran', 'like', '%' . $search . '%');
            });
        });
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'kode_alternatif', 'kode_alternatif');
    }
}
