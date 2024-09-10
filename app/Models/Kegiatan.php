<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * 
 *
 * @property string $id
 * @property string $nama
 * @property string|null $tgl_mulai
 * @property string|null $tgl_selesai
 * @property string|null $tgl_tutup
 * @property string $level_rekap_1
 * @property string $level_rekap_2
 * @property string $level_assignment
 * @property string $unit_observasi
 * @property string $unit_sampel
 * @property int $tahun
 * @property string $level_pendataan
 * @property string $frekuensi
 * @property string $seri
 * @property string|null $subkategori
 * @property string|null $kode_subkategori
 * @property string $petugas_level_1
 * @property string|null $petugas_level_2
 * @property string|null $petugas_level_3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read mixed $nama_and_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SatuanKerja> $satuanKerjas
 * @property-read int|null $satuan_kerjas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereFrekuensi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereKodeSubkategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereLevelAssignment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereLevelPendataan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereLevelRekap1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereLevelRekap2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan wherePetugasLevel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan wherePetugasLevel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan wherePetugasLevel3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereSeri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereSubkategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereTglSelesai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereTglTutup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereUnitObservasi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereUnitSampel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kegiatan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Kegiatan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'id';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        // static::creating(function ($model) {
        //     $model->id = Str::slug($model->level_wilayah_kerja."-".$model->nama);
        // });
    }
    public function satuanKerjas(){
        return $this->belongsToMany(SatuanKerja::class,"satuan_kerja_kegiatans","kegiatan_id","satuan_kerja_id");
    }
    public function assignments(){
        return $this->hasMany(Assignment::class,"kegiatan_id","id");
    }

    protected function namaAndId(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes["nama"]." | ".$attributes["id"],
        );
    }
    public static function getKegiatan($with_role = true){
        $kegiatans = Kegiatan::query();
        if($with_role){
            if(!auth()->user()->hasRole("super_admin"));
        }
    }

}
