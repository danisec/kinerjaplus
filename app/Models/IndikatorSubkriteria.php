<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorSubkriteria extends Model
{
    use HasFactory;

    protected $table = 'indikator_subkriteria';
    protected $guarded = ['id_indikator_subkriteria'];
    protected $primaryKey = 'id_indikator_subkriteria';

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class, 'kode_subkriteria', 'kode_subkriteria');
    }

    public function skalaIndikator()
    {
        return $this->hasMany(SkalaIndikator::class, 'id_indikator_subkriteria', 'id_indikator_subkriteria');
    }

    public function penilaianIndikator()
    {
        return $this->hasMany(PenilaianIndikator::class, 'id_indikator_subkriteria', 'id_indikator_subkriteria');
    }
}
