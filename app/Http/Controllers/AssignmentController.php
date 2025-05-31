<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!request('kegiatanId')) {
            return abort('400', "'kegiatanId' tidak boleh kosong");
        }
        $organisasi = Organisasi::where("pencacah_id", $user->id)
            ->orWhere("pengawas_id", $user->id)
            ->orWhere("koseka_id", $user->id)
            ->first();
        $role = Organisasi::getUserKegiatanRoleByOrganisasi($user->id, $organisasi);
        $assignments = Assignment::getAssignments(request('requestId'), $user->id, $role)?->get();
        return response()->json([
            'assignments' => $assignments,
            'kegiatanId' => request('kegiatanId'),
            'userId' => $user->id,
            'organisasi' => $organisasi,
            'role' => $role
        ]);
    }
    public function jumlah()
    {
        $user = auth()->user();
        if (!request('kegiatanId')) {
            return abort('400', "'kegiatanId' tidak boleh kosong");
        }
        $organisasi = Organisasi::where("pencacah_id", $user->id)
            ->orWhere("pengawas_id", $user->id)
            ->orWhere("koseka_id", $user->id)
            ->first();
        $role = Organisasi::getUserKegiatanRoleByOrganisasi($user->id, $organisasi);
        $assignmentsCount = Assignment::getAssignments(request('kegiatanId'), $user->id, $role)?->count();
        return response()->json([
            'assignmentsCount' => $assignmentsCount
        ]);
    }
    public function show($assignmentId)
    {
        $user = auth()->user();
        if (!request('kegiatanId')) {
            return abort('400', "'kegiatanId' tidak boleh kosong");
        }
        $assignment = Assignment::find($assignmentId);
        return response()->json([
            'assignment' => $assignment
        ]);
    }
}
