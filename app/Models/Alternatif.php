<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $guarded = ['id_alternatif'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('nama_alternatif', 'like', '%'. $search . '%')
                ->orWhere('kode_alternatif', 'like', '%' . $search . '%')
        );
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'fullname', 'nama_alternatif');
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'alternatif_pertama', 'kode_alternatif');
    }
}
