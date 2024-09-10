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
 * @property string|null $level_wilayah_kerja
 * @property string|null $wilayah_kerja_id
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Kegiatan> $kegiatans
 * @property-read int|null $kegiatans_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja whereLevelWilayahKerja($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerja whereWilayahKerjaId($value)
 * @mixin \Eloquent
 */
class SatuanKerja extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::slug($model->wilayah_kerja_id . "-" . $model->nama);
        });
    }

    protected function satuanKerjaWithId(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => "[" . $attributes['wilayah_kerja_id'] . "] " . $attributes['nama'],
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'satuan_kerja_users', 'satuan_kerja_id', 'user_id');
    }

    public function kegiatans()
    {
        return $this->belongsToMany(Kegiatan::class, 'satuan_kerja_kegiatans', 'satuan_kerja_id', 'kegiatan_id');
    }
    public static function getSatuanKerja($with_role = true)
    {
        $satuanKerjas = self::query();
        if ($with_role) {
            if (!auth()->user()->hasRole("super_admin")) {
                $satuanKerjas->whereHas('users', function ($q) {
                    $q->where('id', auth()->user()->id);
                });
            };
        }
        return $satuanKerjas;
    }
}
