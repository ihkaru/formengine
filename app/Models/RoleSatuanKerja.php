<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

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

    public static function assign($data){
        $user = User::find($data["user_id"]);
        if(!$user->hasRole($data["role_name"])){
            $user->assignRole($data["role_name"]);
        }
        return self::create($data);
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function satuanKerja(){
        return $this->belongsTo(SatuanKerja::class,"satuan_kerja_id","id");
    }
    public function kegiatan(){
        return $this->belongsTo(Kegiatan::class,"kegiatan_id","id");
    }
    public function role(){
        return $this->belongsTo(Role::class,"role_name","name");
    }
}
