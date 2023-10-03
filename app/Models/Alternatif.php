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
}
