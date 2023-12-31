<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianIndikator extends Model
{
    use HasFactory;

    protected $table = 'penilaian_indikator';
    protected $guarded = ['id_penilaian_indikator'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'id_penilaian', 'id_penilaian');
    }

    public function indikatorSubkriteria()
    {
        return $this->belongsTo(IndikatorSubkriteria::class, 'id_indikator_subkriteria', 'id_indikator_subkriteria');
    }

    public function skalaIndikatorDetail()
    {
        return $this->belongsTo(SkalaIndikatorDetail::class, 'id_skala_indikator_detail', 'id_skala_indikator_detail');
    }
}
