<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 *
 *
 * @property int $id
 * @property string $desa_kel_id
 * @property string $kec_id
 * @property string $kabkot_id
 * @property string $prov_id
 * @property string $sls_id
 * @property string $provinsi
 * @property string $kabkot
 * @property string $kecamatan
 * @property string $desa_kel
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls query()
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereDesaKel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereDesaKelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereKabkot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereKabkotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereKecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereKecamatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereProvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereProvinsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereSlsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MasterSls whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MasterSls extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static Collection $mastersls;

    protected function slsWithId(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "[" . $attributes['sls_id'] . "] " . $attributes['nama'],
        );
    }
    protected function desaKelWithId(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "[" . $attributes['desa_kel_id'] . "] " . $attributes['desa_kel'],
        );
    }
    protected function kecWithId(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "[" . $attributes['kec_id'] . "] " . $attributes['kecamatan'],
        );
    }
    protected function kabkotWithId(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "[" . $attributes['kabkot_id'] . "] " . $attributes['kabkot'],
        );
    }
    protected function provWithId(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "[" . $attributes['prov_id'] . "] " . $attributes['provinsi'],
        );
    }

    public static function getMasterSls()
    {
        self::$mastersls = self::$mastersls ?? self::get();
        return self::$mastersls;
    }
    public static function getProvOptions($pluck = true)
    {
        return self::getOptions("provinsi", "prov_id", $pluck);
    }
    public static function getOptions($column, $column_id, $pluck = true)
    {
        $res = self::query();
        $res->selectRaw("$column_id,$column")
            ->orderBy("$column_id")
            ->distinct();
        if ($pluck) return $res->pluck($column, $column_id);;
        return $res;
    }
    public static function getKabkotOptions($prov_id = null, $pluck = true)
    {
        if ($prov_id) {
            $res = self::getOptions("kabkot_id", "kabkot", false);
            return $res->where("prov_id", $prov_id);
        }
        return self::getOptions("kabkot_id", "kabkot", $pluck);
    }
    public static function getKecamatanOptions($kabkot_id = null, $pluck = true)
    {
        if ($kabkot_id) {
            $res = self::getOptions("kec_id", "kecamatan", false);
            return $res->where("kabkot_id", $kabkot_id);
        }
        return self::getOptions("kec_id", "kecamatan", $pluck);
    }
    public static function getDesaKelOptions($kec_id = null, $pluck = true)
    {
        if ($kec_id) {
            $res = self::getOptions("desa_kel_id", "desa_kel", false);
            return $res->where("kec_id", $kec_id);
        }
        return self::getOptions("desa_kel_id", "desa_kel", $pluck);
    }
    public static function getSlsOptions($desa_kel_id = null, $pluck = true)
    {
        if ($desa_kel_id) {
            $res = self::getOptions("sls_id", "nama", false);
            return $res->where("desa_kel_id", $desa_kel_id);
        }
        return self::getOptions("sls_id", "nama", $pluck);
    }
    public static function getProvSatker($wilayah_kerja_ids)
    {
        $res = self::getProvOptions(pluck: false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v) => substr($v, 0, 2))->toArray();
        $res->whereIn('prov_id', $wilayah_kerja_ids);
        return $res->get()->pluck("provWithId", "prov_id");
    }
    public static function getKabkotSatker($wilayah_kerja_ids)
    {
        if (strlen($wilayah_kerja_ids->first()) == 2) {
            return self::getKabkotOptions(pluck: false)->where("prov_id", $wilayah_kerja_ids->first())->get()->pluck("kabkotWithId", "kabkot_id");
        }
        $res = self::getKabkotOptions(pluck: false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v) => substr($v, 0, 4))->toArray();
        $res->whereIn('kabkot_id', $wilayah_kerja_ids);
        return $res->get()->pluck("kabkotWithId", "kabkot_id");
    }
    public static function getKecamatanSatker($wilayah_kerja_ids)
    {
        if (strlen($wilayah_kerja_ids->first()) == 4) {
            return self::getKecamatanOptions(pluck: false)->where("kabkot_id", $wilayah_kerja_ids->first())->get()->pluck("kecWithId", "kec_id");
        }
        $res = self::getKecamatanOptions(pluck: false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v) => substr($v, 0, 7))->toArray();
        $res->whereIn('kec_id', $wilayah_kerja_ids);
        return $res->get()->pluck("kecWithId", "kec_id");
    }
    public static function getDesaKelSatker($wilayah_kerja_ids)
    {
        if (strlen($wilayah_kerja_ids->first()) == 7) {
            return self::getDesaKelOptions(pluck: false)->where("kec_id", $wilayah_kerja_ids->first())->get()->pluck("desaKelWithId", "desa_kel_id");
        }
        $res = self::getDesaKelOptions(pluck: false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v) => substr($v, 0, 10))->toArray();
        $res->whereIn('desa_kel_id', $wilayah_kerja_ids);
        return $res->get()->pluck("desaKelWithId", "desa_kel_id");
    }
    public static function getSlsSatker($wilayah_kerja_ids)
    {
        if (strlen($wilayah_kerja_ids->first()) == 10) {
            return self::getSlsOptions(pluck: false)->where("desa_kel_id", $wilayah_kerja_ids->first())->get()->pluck("slsWithId", "sls_id");
        }
        $res = self::getSlsOptions(pluck: false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v) => substr($v, 0, 16))->toArray();
        $res->whereIn('sls_id', $wilayah_kerja_ids);
        return $res->get()->pluck("slsWithId", "sls_id");
    }
}
