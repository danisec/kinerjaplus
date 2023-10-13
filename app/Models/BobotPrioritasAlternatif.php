<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotPrioritasAlternatif extends Model
{
    use HasFactory;

    protected $table = 'bobot_prioritas_alternatif';
    protected $guarded = ['id_bobot_prioritas_alternatif'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'kode_alternatif', 'kode_alternatif');
    }
}
