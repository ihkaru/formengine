<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Master extends Model
{
    protected $guarded = [];
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = false;

    use HasFactory;

    public function kegiatans(): BelongsToMany
    {
        return $this->belongsToMany(Kegiatan::class, 'master_kegiatan', 'master_id', 'kegiatan_id');
    }
}
