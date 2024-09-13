<?php

namespace App\Models;

use App\Supports\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $versi
 * @property string $label_versi
 * @property string $template
 * @property string $kegiatan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Template newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Template newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Template query()
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereKegiatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereLabelVersi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Template whereVersi($value)
 * @mixin \Eloquent
 */
class Template extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, "kegiatan_id", "id");
    }
    public static function getLatestTemplate($kegiatan_id)
    {
        return Template::where("kegiatan_id", $kegiatan_id)
            ->where("label_versi", Constants::VERSI_TEMPLATE_LATEST)->first();
    }
}
