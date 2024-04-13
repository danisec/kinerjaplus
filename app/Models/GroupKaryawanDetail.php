<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupKaryawanDetail extends Model
{
    use HasFactory;

    protected $table = 'group_karyawan_detail';
    protected $guarded = ['id_group_karyawan_detail'];
    protected $primaryKey = 'id_group_karyawan_detail';

    public function groupKaryawan()
    {
        return $this->belongsTo(GroupKaryawan::class, 'id_group_karyawan', 'id_group_karyawan');
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'kode_alternatif', 'kode_alternatif');
    }
}
