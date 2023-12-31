<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotPrioritasSubkriteria extends Model
{
    use HasFactory;

    protected $table = 'bobot_prioritas_subkriteria';
    protected $guarded = ['id_bobot_prioritas_subkriteria'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kode_kriteria', 'kode_kriteria');
    }
}
