<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getPetugasSatker($satuanKerjas){
        $res = User::whereHas("satuanKerja",function($q)use($satuanKerjas){
            $q->whereIn("satuan_kerjas.id",$satuanKerjas->pluck("id"));
        });
        return $res;
    }
}
