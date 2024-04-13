<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupKaryawan extends Model
{
    use HasFactory;

    protected $table = 'group_karyawan';
    protected $guarded = ['id_group_karyawan'];
    protected $primaryKey = 'id_group_karyawan';

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('nama_group_karyawan', 'like', '%'. $search . '%')
        );
    }

    public function groupKaryawanDetail()
    {
        return $this->hasMany(GroupKaryawanDetail::class, 'id_group_karyawan', 'id_group_karyawan');
    }
}
