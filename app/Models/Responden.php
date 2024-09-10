<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * 
 *
 * @property int $id
 * @property string $kegiatan_id
 * @property int $template_id
 * @property string|null $provinsi_id
 * @property string|null $kabkot_id
 * @property string|null $kecamatan_id
 * @property string|null $desa_id
 * @property string|null $sls_id
 * @property string|null $bs_id
 * @property int|null $last_riwayat_status
 * @property string|null $terakhir_diisi
 * @property string $data
 * @property int|null $jumlah_blank
 * @property int|null $jumlah_error
 * @property int|null $jumlah_warning
 * @property int|null $jumlah_terisi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Responden newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Responden newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Responden query()
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereBsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereDesaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereJumlahBlank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereJumlahError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereJumlahTerisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereJumlahWarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereKabkotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereKecamatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereLastRiwayatStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereProvinsiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereSlsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereTerakhirDiisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Responden whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Responden extends Model
{
    use HasFactory;

    protected $guarded=[];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::orderedUuid();
        });
    }
}
