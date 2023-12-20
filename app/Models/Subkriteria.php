<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;

    protected $table = 'subkriteria';
    protected $guarded = ['id_subkriteria'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('nama_subkriteria', 'like', '%'. $search . '%')
                ->orWhere('kode_subkriteria', 'like', '%' . $search . '%')
        );
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }

    public function indikatorSubkriteria()
    {
        return $this->hasMany(IndikatorSubkriteria::class, 'kode_subkriteria', 'kode_subkriteria');
    }
}
