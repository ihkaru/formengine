<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function namaAndId(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes["nama"]." | ".$attributes["id"],
        );
    }

}
