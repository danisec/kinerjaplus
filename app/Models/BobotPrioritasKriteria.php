<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotPrioritasKriteria extends Model
{
    use HasFactory;

    protected $table = 'bobot_prioritas_kriteria';
    protected $primaryKey = 'id_bobot_prioritas_kriteria';
    protected $guarded = ['id_bobot_prioritas_kriteria'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
