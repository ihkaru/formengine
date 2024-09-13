<?php

namespace App\Models;

use App\Supports\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PDO;

/**
 *
 *
 * @property int $id
 * @property string $pencacah_id
 * @property string $responden_id
 * @property string $kegiatan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePencacahId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereRespondenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Assignment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = static::generateHashedId($model->email);
        });
    }

    public static function generateHashedId($email)
    {
        return Str::uuid();
    }
    public static function getAssignments($kegiatan_id, $user_id, $role)
    {
        if ($role == Constants::JABATAN_LEVEL_2_PETUGAS_PEMERIKSA_LAPANGAN) {
            $petugasLevel1s = Organisasi::where("pengawas_id", $user_id)
                ->where("kegiatan_id", $kegiatan_id)
                ->pluck("pencacah_id");
            return Assignment::whereIn("pencacah_id", $petugasLevel1s->flatten()->toArray())
                ->where("kegiatan_id", $kegiatan_id);
        }
        if ($role == Constants::JABATAN_LEVEL_1_PETUGAS_PENDATAAN_LAPANGAN) {
            return Assignment::where("pencacah_id", $user_id)
                ->where("kegiatan_id", $kegiatan_id);
        }
        return null;
    }
    public function respondens()
    {
        return $this->belongsTo(Responden::class, "responden_id", "id");
    }
    public function petugasLevel1()
    {
        return $this->belongsTo(User::class, "pencacah_id", "id");
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, "kegiatan_id", "id");
    }
}
