<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaIndikatorDetail extends Model
{
    use HasFactory;

    protected $table = 'skala_indikator_detail';
    protected $guarded = ['id_skala_indikator_detail'];
    protected $primaryKey = 'id_skala_indikator_detail';

    public function skalaIndikator()
    {
        return $this->belongsTo(SkalaIndikator::class, 'id_skala_indikator', 'id_skala_indikator');
    }
}
