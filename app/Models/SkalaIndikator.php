<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaIndikator extends Model
{
    use HasFactory;

    protected $table = 'skala_indikator';
    protected $guarded = ['id_skala_indikator'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->whereHas('indikatorSubkriteria', function ($query) use ($search) {
                    $query->where('indikator_subkriteria', 'like', '%' . $search . '%');
                });
            });
        });
    }

    public function indikatorSubkriteria()
    {
        return $this->belongsTo(IndikatorSubkriteria::class, 'id_indikator_subkriteria', 'id_indikator_subkriteria');
    }

    public function skalaIndikatorDetail()
    {
        return $this->hasMany(SkalaIndikatorDetail::class, 'id_skala_indikator', 'id_skala_indikator');
    }
}
