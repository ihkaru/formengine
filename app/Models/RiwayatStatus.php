<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $kegiatan_id
 * @property string $responden_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus whereRespondenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RiwayatStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RiwayatStatus extends Model
{
    use HasFactory;
}
