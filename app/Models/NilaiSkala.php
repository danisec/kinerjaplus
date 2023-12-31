<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSkala extends Model
{
    use HasFactory;

    protected $table = 'nilai_skala';
    protected $guarded = ['id_nilai_skala'];
}
