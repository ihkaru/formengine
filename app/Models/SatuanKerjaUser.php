<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

/**
 * 
 *
 * @property int $id
 * @property string $satuan_kerja_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SatuanKerja|null $satuanKerja
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser whereSatuanKerjaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SatuanKerjaUser whereUserId($value)
 * @mixin \Eloquent
 */
class SatuanKerjaUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function satuanKerja(){
        return $this->hasOne(SatuanKerja::class,"id","satuan_kerja_id");
    }
    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
}
