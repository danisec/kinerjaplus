<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggalPenilaian extends Model
{
    use HasFactory;

    protected $table = 'tanggal_penilaian';
    protected $guarded = ['id_tanggal_penilaian'];
    protected $primaryKey = 'id_tanggal_penilaian';

    public function groupKaryawan()
    {
        return $this->belongsTo(GroupKaryawan::class, 'id_group_karyawan', 'id_group_karyawan');
    }
}
