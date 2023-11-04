<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorSubkriteria extends Model
{
    use HasFactory;

    protected $table = 'indikator_subkriteria';
    protected $guarded = ['id_indikator_subkriteria'];
}
