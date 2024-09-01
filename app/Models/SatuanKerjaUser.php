<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

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
