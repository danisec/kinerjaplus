<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPenilaianDetail extends Model
{
    use HasFactory;

    protected $table = 'group_penilaian_detail';
    protected $guarded = ['id_group_penilaian_detail'];
    protected $primaryKey = 'id_group_penilaian_detail';

    public function groupPenilaian()
    {
        return $this->belongsTo(GroupPenilaian::class, 'id_group_penilaian', 'id_group_penilaian');
    }

    public function alternatifKedua()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_kedua', 'kode_alternatif');
    }
}
