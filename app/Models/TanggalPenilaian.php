<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggalPenilaian extends Model
{
    use HasFactory;

    protected $table = 'tanggal_penilaian';
    protected $guarded = ['id_tanggal_penilaian'];
    protected $primaryKey = 'id_tanggal_penilaian';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('tahun_ajaran', 'like', '%'. $search . '%')
                ->orWhere('semester', 'like', '%' . $search . '%')
        );
    }

    public function groupKaryawan()
    {
        return $this->belongsTo(GroupKaryawan::class, 'id_group_karyawan', 'id_group_karyawan');
    }
}
