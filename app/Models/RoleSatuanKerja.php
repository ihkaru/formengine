<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

/**
 *
 *
 * @property int $id
 * @property string $user_id
 * @property string $kegiatan_id
 * @property string $role_name
 * @property string $satuan_kerja_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Kegiatan $kegiatan
 * @property-read Role|null $role
 * @property-read \App\Models\SatuanKerja $satuanKerja
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja whereSatuanKerjaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSatuanKerja whereUserId($value)
 * @mixin \Eloquent
 */
class RoleSatuanKerja extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            $model->user->removeRole($model->role_name);
        });
    }

    public static function assign($data)
    {
        $user = User::find($data["user_id"]);
        if (!$user->hasRole($data["role"])) {
            $user->assignRole($data["role"]);
        }
        return self::create($data);
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function satuanKerja()
    {
        return $this->belongsTo(SatuanKerja::class, "satuan_kerja_id", "id");
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, "kegiatan_id", "id");
    }
    public function role()
    {
        return $this->belongsTo(Role::class, "role", "name");
    }
}
