<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanKerjaKegiatan extends Model
{
    use HasFactory;

    public function satuanKerja(){
        return $this->hasOne(SatuanKerja::class,"id","satuan_kerja_id");
    }
    public function kegiatan(){
        return $this->hasOne(Kegiatan::class,"id","kegiatan_id");
    }
}
