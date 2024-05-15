<?php

namespace App\Models;

use App\Models\Traits\HasAlternatif;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupKaryawan extends Model
{
    use HasFactory, HasAlternatif;

    protected $table = 'group_karyawan';
    protected $guarded = ['id_group_karyawan'];
    protected $primaryKey = 'id_group_karyawan';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('nama_group_karyawan', 'like', '%'. $search . '%')
        );
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setAlternatifKeys('kepala_sekolah', 'kode_alternatif');
    }

    public function groupKaryawanDetail()
    {
        return $this->hasMany(GroupKaryawanDetail::class, 'id_group_karyawan', 'id_group_karyawan');
    }

    public function groupPenilaian()
    {
        return $this->hasMany(GroupPenilaian::class, 'id_group_karyawan', 'id_group_karyawan');
    }
}
