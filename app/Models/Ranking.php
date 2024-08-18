<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Ranking extends Model
{
    use HasFactory, Sortable;

    protected $table = 'ranking';
    protected $guarded = ['id_ranking'];
    protected $primaryKey = 'id_ranking';

    public $sortable = [
        'tahun_ajaran',
        'kode_alternatif',
        'nilai',
        'rank',
    ];

    public function tanggalPenilaian()
    {
        return $this->belongsTo(TanggalPenilaian::class, 'id_tanggal_penilaian', 'id_tanggal_penilaian');
    }

    public function alternatif()
    {
        return $this->belongsTo(GroupPenilaian::class, 'kode_alternatif', 'alternatif_pertama');
    }
}
