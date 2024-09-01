<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
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
            $model->id = Str::slug($model->level_wilayah_kerja."-".$model->nama);
        });
    }

    public function users(){
        return $this->belongsToMany(User::class,'satuan_kerja_users','satuan_kerja_id','user_id');
    }

    public function kegiatans(){
        return $this->belongsToMany(Kegiatan::class,'satuan_kerja_kegiatans','satuan_kerja_id','kegiatan_id');
    }
}
