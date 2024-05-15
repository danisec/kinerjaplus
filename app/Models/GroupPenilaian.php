<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPenilaian extends Model
{
    use HasFactory;

    protected $table = 'group_penilaian';
    protected $guarded = ['id_group_penilaian'];
    protected $primaryKey = 'id_group_penilaian';

    public function alternatifPertama()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_pertama', 'kode_alternatif');
    }

    public function groupKaryawan()
    {
        return $this->belongsTo(GroupKaryawan::class, 'id_group_karyawan', 'id_group_karyawan');
    }

    public function groupPenilaianDetail()
    {
        return $this->hasMany(GroupPenilaianDetail::class, 'id_group_penilaian', 'id_group_penilaian');
    }
}
