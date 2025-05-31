<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use App\Models\WilayahKerja;
use Illuminate\Http\Request;

class WilayahKerjaController extends Controller
{
    public function wilayahKerja(string $kegiatanId)
    {
        $user = auth()->user();
        $organisasi = Organisasi::where("pencacah_id", $user->id)
            ->orWhere("pengawas_id", $user->id)
            ->orWhere("koseka_id", $user->id)
            ->first();
        $role = Organisasi::getUserKegiatanRoleByOrganisasi($user->id, $organisasi);
        $wilayahKerja = WilayahKerja::getWilayahTugas($kegiatanId, $user->id, $role)?->get();
        return response()->json([
            "wilayahKerjas" => $wilayahKerja
        ]);
    }
}
