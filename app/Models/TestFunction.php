<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $rincian_id
 * @property string $kegiatan_id
 * @property string $fungsi
 * @property string $jenis
 * @property string $invalid_helper
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction query()
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereFungsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereInvalidHelper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereRincianId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TestFunction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TestFunction extends Model
{
    use HasFactory;
}
