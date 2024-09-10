<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $satuan_kerja_id
 * @property string $kegiatan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kegiatan|null $kegiatan
 * @property-read \App\Models\SatuanKerja|null $satuanKerja
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan whereSatuanKerjaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaKegiatan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SatuanKerjaKegiatan extends Model
{
    use HasFactory;

    public function satuanKerja(){
        return $this->hasOne(SatuanKerja::class,"id","satuan_kerja_id");
    }
    public function kegiatan(){
        return $this->hasOne(Kegiatan::class,"id","kegiatan_id");
    }
}
