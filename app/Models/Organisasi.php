<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $kegiatan_id
 * @property string $pencacah_id
 * @property string $pengawas_id
 * @property string $koseka_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi whereKosekaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi wherePencacahId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi wherePengawasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Organisasi whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Organisasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getPetugasSatker($satuanKerjas, $kegiatan)
    {
        $res = User::whereHas("satuanKerjas", function ($q) use ($satuanKerjas) {
            $q->whereIn("satuan_kerjas.id", $satuanKerjas->pluck("id"));
        });
        return $res;
    }
    public static function getPencacahSatker($satuanKerjas, $kegiatan)
    {
        $query = self::where("kegiatan_id", $kegiatan->id);
        $penanggungJawab = $query->pluck("koseka_id")->filter(fn($v, $k) => $v != null);
        $pengawas = $query->pluck("pengawas_id")->filter(fn($v, $k) => $v != null);
        return self::getPetugasSatker($satuanKerjas, $kegiatan)->whereNotIn("id", $pengawas->merge($penanggungJawab)->unique()->flatten()->toArray());
    }
    public static function getPengawasSatker($satuanKerjas, $kegiatan)
    {
        $query = self::where("kegiatan_id", $kegiatan->id);
        $penanggungJawab = $query->pluck("koseka_id")->filter(fn($v, $k) => $v != null);
        $pencacah = $query->pluck("pencacah_id")->filter(fn($v, $k) => $v != null);
        return self::getPetugasSatker($satuanKerjas, $kegiatan)->whereNotIn("id", $pencacah->merge($penanggungJawab)->unique()->flatten()->toArray());
    }
    public static function getPenanggungJawabSatker($satuanKerjas, $kegiatan)
    {
        $query = self::where("kegiatan_id", $kegiatan->id);
        $pengawas = $query->pluck("pengawas_id")->filter(fn($v, $k) => $v != null);
        $pencacah = $query->pluck("pencacah_id")->filter(fn($v, $k) => $v != null);
        return self::getPetugasSatker($satuanKerjas, $kegiatan)->whereNotIn("id", $pencacah->merge($pengawas)->unique()->flatten()->toArray());
    }
    public function pencacah()
    {
        return $this->belongsTo(User::class, "pencacah_id", "id");
    }
    public function pengawas()
    {
        return $this->belongsTo(User::class, "pengawas_id", "id");
    }
    public function koseka()
    {
        return $this->belongsTo(User::class, "koseka_id", "id");
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, "kegiatan_id", "id");
    }
    public static function alokasi($data)
    {
        if (isset($data["ganti_petugas"])) {
            return self::where("kegiatan_id", $data["kegiatan_id"])
                ->where("pengawas_id", $data["petugas_level_2"])
                ->where("koseka_id", $data["petugas_level_3"])
                ->update([
                    "pencacah_id" => $data["petugas_level_1"]
                ])
            ;
        }
        return self::updateOrCreate([
            "pengawas_id" => $data["petugas_level_2"],
            "koseka_id" => $data["petugas_level_3"],
            "kegiatan_id" => $data["kegiatan_id"]
        ], [
            "pencacah_id" => $data["petugas_level_1"],
        ]);
    }
}
