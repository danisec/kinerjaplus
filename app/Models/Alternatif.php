<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $guarded = ['id_alternatif'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('nama_alternatif', 'like', '%'. $search . '%')
                ->orWhere('kode_alternatif', 'like', '%' . $search . '%')
        );
    }

    public function groupKaryawan()
    {
        return $this->belongsTo(GroupKaryawan::class, 'kode_alternatif', 'kepala_sekolah');
    }

    public function groupKaryawanDetail()
    {
        return $this->belongsTo(GroupKaryawanDetail::class, 'kode_alternatif', 'kode_alternatif');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'nama_alternatif', 'fullname');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'alternatif_pertama', 'kode_alternatif');
    }

    public function groupPenilaianDetail()
    {
        return $this->hasMany(GroupPenilaianDetail::class, 'alternatif_kedua', 'kode_alternatif');
    }
}
