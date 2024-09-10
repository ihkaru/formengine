<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $rincian_id
 * @property string $nilai
 * @property string $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi whereNilai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi whereRincianId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Opsi whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Opsi extends Model
{
    use HasFactory;
}
