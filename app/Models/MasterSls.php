<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSls extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected static Collection $mastersls;

    public static function getMasterSls(){
        self::$mastersls = self::$mastersls ?? self::get();
        return self::$mastersls;
    }
    public static function getProvOptions($pluck=true){
        return self::getOptions("provinsi","prov_id",$pluck);
    }
    public static function getOptions($column,$column_id,$pluck=true){
        $res = self::query();
        $res->selectRaw("$column_id,$column")
            ->distinct();
        if($pluck) return $res->pluck($column,$column_id);;
        return $res;
    }
    public static function getKabkotOptions($prov_id = null,$pluck=true){
        if($prov_id){
            $res = self::getOptions("kabkot_id","kabkot",false);
            return $res->where("prov_id",$prov_id);
        }
        return self::getOptions("kabkot_id","kabkot",$pluck);
    }
    public static function getKecamatanOptions($kabkot_id = null,$pluck=true){
        if($kabkot_id){
            $res = self::getOptions("kec_id","kecamatan",false);
            return $res->where("kabkot_id",$kabkot_id);
        }
        return self::getOptions("kec_id","kecamatan",$pluck);
    }
    public static function getDesaKelOptions($kec_id = null,$pluck=true){
        if($kec_id){
            $res = self::getOptions("desa_kel_id","desa_kel",false);
            return $res->where("kec_id",$kec_id);
        }
        return self::getOptions("desa_kel_id","desa_kel",$pluck);
    }
    public static function getProvSatker($wilayah_kerja_ids){
        $res = self::getProvOptions(pluck:false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v)=>substr($v,0,2))->toArray();
        $res->whereIn('prov_id',$wilayah_kerja_ids);
        return $res->pluck("provinsi","prov_id");
    }
    public static function getKabkotSatker($wilayah_kerja_ids){
        if(strlen($wilayah_kerja_ids->first()) == 2){
            return self::getKabkotOptions(pluck:false)->where("kabkot_id",$wilayah_kerja_ids->first())->pluck("kabkot","kabkot_id");
        }
        $res = self::getKabkotOptions(pluck:false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v)=>substr($v,0,4))->toArray();
        $res->whereIn('kabkot_id',$wilayah_kerja_ids);
        return $res->pluck("kabkot","kabkot_id");
    }
    public static function getKecamatanSatker($wilayah_kerja_ids){
        if(strlen($wilayah_kerja_ids->first()) == 4){
            return self::getKecamatanOptions(pluck:false)->where("kec_id",$wilayah_kerja_ids->first())->pluck("kecamatan","kec_id");
        }
        $res = self::getKecamatanOptions(pluck:false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v)=>substr($v,0,7))->toArray();
        $res->whereIn('kec_id',$wilayah_kerja_ids);
        return $res->pluck("kecamatan","kec_id");
    }
    public static function getDesaKelSatker($wilayah_kerja_ids){
        if(strlen($wilayah_kerja_ids->first()) == 10){
            return self::getDesaKelOptions(pluck:false)->where("desa_kel_id",$wilayah_kerja_ids->first())->pluck("desa_kel","desa_kel_id");
        }
        $res = self::getDesaKelOptions(pluck:false);
        $wilayah_kerja_ids = $wilayah_kerja_ids->map(fn($v)=>substr($v,0,10))->toArray();
        $res->whereIn('desa_kel_id',$wilayah_kerja_ids);
        return $res->pluck("desa_kel","desa_kel_id");
    }

}
