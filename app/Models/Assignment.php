<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        $appKey = config('app.key');
        return hash_hmac('md5', $email, $appKey);
    }
}
