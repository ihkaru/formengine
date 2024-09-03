<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index(){
        return response()->json([
            "kegiatans"=> $this->kegiatans(mode: "paginate"),
            "rekapitulasi" => $this->rekapitulasi()
        ]);
    }

    public function kegiatans($mode = 'paginate',$on_date = null){
        $kegiatans = Kegiatan::query();
        $user = auth()->user();
        $kegiatans->whereHas("satuanKerjas.users",function($q) use($user){$q->where('users.id',$user->id);});
        $perPage = 30;
        $on_date = request("on_date") ?? now();
        $kegiatans->whereDate("tgl_tutup",">=",$on_date);
        if(request("per_page")){
            if(collect(["1","10","30","50"])->contains($perPage)) $perPage = request("per_page");;
        }
        if($mode == 'paginate') return $kegiatans->paginate($perPage);
        if($mode == 'get') return $kegiatans->get();
        if($mode == 'query') return $kegiatans;
    }
    public function rekapitulasi(){
        $user = auth()->user();
        // Jumlah Kegiatan
        // Jumlah Kegiatan Periode Berjalan
        // Jumlah Assignment
        $on_date = request("on_date") ?? now();

        $jumlah_assignment = $this->kegiatans('query')->whereDate('tgl_mulai','>=',$on_date)->whereHas("assignments",function($q)use($user){
            $q->where("pencacah_id",$user->id);
                // ->orWhere("pengawas_id",$user->id);
        })->count();
        $periode_berjalan = $this->kegiatans('query')->whereDate('tgl_mulai','>=',$on_date)->count();
        $semua_kegiatan = $this->kegiatans('query', now()->addYear(-20))->count();

        return [
            "assignment"=>$jumlah_assignment,
            "periode"=>$periode_berjalan,
            "kegiatan"=>$semua_kegiatan
        ];

    }
}
