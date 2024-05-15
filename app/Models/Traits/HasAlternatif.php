<?php
namespace App\Models\Traits;

use App\Models\Alternatif;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAlternatif
{
    protected $foreignKey = '';
    protected $localKey = '';

    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Alternatif::class, $this->foreignKey, $this->localKey);
    }

    public function setAlternatifKeys(string $foreignKey, string $localKey): void
    {
        $this->foreignKey = $foreignKey;
        $this->localKey = $localKey;
    }
}