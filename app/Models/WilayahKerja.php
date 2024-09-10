<?php

namespace App\Models;

use App\Supports\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $petugas_level_1_id
 * @property string $kegiatan_id
 * @property string $prov_id
 * @property string $kabkot_id
 * @property string|null $kec_id
 * @property string|null $desa_kel_id
 * @property string|null $sls_id
 * @property string|null $bs_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kegiatan $kegiatan
 * @property-read \App\Models\User $petugasLevel1
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereBsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereDesaKelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereKabkotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereKecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja wherePetugasLevel1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereProvId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereSlsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WilayahKerja whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WilayahKerja extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function petugasLevel1()
    {
        return $this->belongsTo(User::class, "petugas_level_1_id", "id");
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, "kegiatan_id", "id");
    }

    public function sls()
    {
        return $this->belongsTo(MasterSls::class, "sls_id", "sls_id");
    }
    public function desaKel()
    {
        return $this->belongsTo(MasterSls::class, "desa_kel_id", "desa_kel_id");
    }
    public function kec()
    {
        return $this->belongsTo(MasterSls::class, "kec_id", "kec_id");
    }
    public function kabkot()
    {
        return $this->belongsTo(MasterSls::class, "kabkot_id", "kabkot_id");
    }
    public function prov()
    {
        return $this->belongsTo(MasterSls::class, "prov_id", "prov_id");
    }

    public static function alokasiPetugas(array $data)
    {
        $res = 0;
        $data["prov_id"] = self::makeArray($data["prov_id"]);
        $data["kabkot_id"] = self::makeArray($data["kabkot_id"]);
        $data["kec_id"] = self::makeArray($data["kec_id"]);
        $data["desa_kel_id"] = self::makeArray($data["desa_kel_id"]);
        $data["sls_id"] = self::makeArray($data["sls_id"]);
        $data["petugas_level_3"] = $data["petugas_level_3"] ?? null;
        $data["petugas_level_2"] = $data["petugas_level_2"] ?? null;
        $data["petugas_level_1"] = $data["petugas_level_1"] ?? null;
        if (Organisasi::alokasi($data)) $res++;
        $res = (self::alokasi($data)) ? $res++ : $res;
        return $res;
    }

    public static function alokasi($data)
    {
        $res = 0;
        if (isset($data["ganti_petugas"])) {
            return self::where("kegiatan_id", $data["kegiatan_id"])
                ->whereIn("prov_id", $data["prov_id"])
                ->whereIn("kabkot_id", $data["kabkot_id"])
                ->whereIn("kec_id", $data["kec_id"])
                ->whereIn("desa_kel_id", $data["desa_kel_id"])
                ->whereIn("sls_id", $data["sls_id"])
                ->update([
                    "petugas_level_1_id" => $data["petugas_level_1_id"]
                ])
            ;
        }
        $kegiatan = Kegiatan::where('id', $data["kegiatan_id"])->first();
        $res = (self::alokasiLevelSls($data, $kegiatan)) ? $res++ : $res;
        $res = (self::alokasiLevelDesaKel($data, $kegiatan)) ? $res++ : $res;
        $res = (self::alokasiLevelKec($data, $kegiatan)) ? $res++ : $res;
        $res = (self::alokasiLevelKabkot($data, $kegiatan)) ? $res++ : $res;
        return $res == 1;
    }

    public static function makeArray($value): array
    {
        if ($value === null) return [];
        if (is_array($value)) return $value;
        return [$value];
    }
    public static function alokasiLevelSls($data, $kegiatan)
    {
        if ($kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_SLS) {
            $res = 0;
            foreach ($data["sls_id"] as $sls) {
                if (self::create(
                    [
                        "petugas_level_1_id" => $data["petugas_level_1"],
                        "kegiatan_id" => $data["kegiatan_id"],
                        "prov_id" => $data["prov_id"][0],
                        "kabkot_id" => $data["kabkot_id"][0],
                        "kec_id" => $data["kec_id"][0],
                        "desa_kel_id" => $data["desa_kel_id"][0],
                        "sls_id" => $sls,
                    ]
                )) $res++;
            }
            return $res == count($data["sls_id"]);
        }
    }
    public static function alokasiLevelDesaKel($data, $kegiatan)
    {
        if ($kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_DESA_KELURAHAN || $kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_DESA) {
            $res = 0;
            foreach ($data["desa_kel_id"] as $desa_kel) {
                if (self::create(
                    [
                        "petugas_level_1_id" => $data["petugas_level_1"],
                        "kegiatan_id" => $data["kegiatan_id"],
                        "prov_id" => $data["prov_id"][0],
                        "kabkot_id" => $data["kabkot_id"][0],
                        "kec_id" => $data["kec_id"][0],
                        "desa_kel_id" => $desa_kel,
                    ]
                )) $res++;
            }
            return $res == count($data["desa_kel_id"]);
        }
    }
    public static function alokasiLevelKec($data, $kegiatan)
    {
        if ($kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_KECAMATAN) {
            $res = 0;
            foreach ($data["kec_id"] as $kec) {
                if (self::create(
                    [
                        "petugas_level_1_id" => $data["petugas_level_1"],
                        "kegiatan_id" => $data["kegiatan_id"],
                        "prov_id" => $data["prov_id"][0],
                        "kabkot_id" => $data["kabkot_id"][0],
                        "kec_id" => $kec,
                    ]
                )) $res++;
            }
            return $res == count($data["kec_id"]);
        }
    }
    public static function alokasiLevelKabkot($data, $kegiatan)
    {
        if ($kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_KABUPATEN) {
            $res = 0;
            foreach ($data["kabkot_id"] as $kabkot) {
                if (self::create(
                    [
                        "petugas_level_1_id" => $data["petugas_level_1"],
                        "kegiatan_id" => $data["kegiatan_id"],
                        "prov_id" => $data["prov_id"][0],
                        "kabkot_id" => $kabkot,
                    ]
                )) $res++;
            }
            return $res == count($data["kabkot_id"]);
        }
    }
    public static function alokasiLevelProv($data, $kegiatan)
    {
        if ($kegiatan->level_rekap_1 == Constants::LEVEL_REKAP_KABUPATEN) {
            $res = 0;
            foreach ($data["prov_id"] as $prov) {
                if (self::create(
                    [
                        "petugas_level_1_id" => $data["petugas_level_1"],
                        "kegiatan_id" => $data["kegiatan_id"],
                        "prov_id" => $prov,
                    ]
                )) $res++;
            }
            return $res == count($data["prov_id"]);
        }
    }
}
