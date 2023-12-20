<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerhitunganSubkriteria extends Model
{
    use HasFactory;

    protected $table = 'perhitungan_subkriteria';
    protected $guarded = ['id_perhitungan_subkriteria'];

    public function subkriteriaPertama()
    {
        return $this->belongsTo(Subkriteria::class, 'subkriteria_pertama', 'kode_subkriteria');
    }

    public function subkriteriaKedua()
    {
        return $this->belongsTo(Subkriteria::class, 'subkriteria_kedua', 'kode_subkriteria');
    }
}
