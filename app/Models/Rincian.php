<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $kegiatan_id
 * @property string $kode_blok
 * @property string $nama_blok
 * @property string|null $kode_subblok
 * @property string|null $nama_subblok
 * @property string $label
 * @property string $jenis
 * @property string $urutan_dalam_seksi
 * @property string $helper
 * @property string|null $ambil
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereAmbil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereHelper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereKodeBlok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereKodeSubblok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereNamaBlok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereNamaSubblok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rincian whereUrutanDalamSeksi($value)
 * @mixin \Eloquent
 */
class Rincian extends Model
{
    use HasFactory;
}
