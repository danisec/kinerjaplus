<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $guarded = ['id_kriteria'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('nama_kriteria', 'like', '%'. $search . '%')
                ->orWhere('kode_kriteria', 'like', '%' . $search . '%')
        );
    }

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
