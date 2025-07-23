<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    /**
     * Tentukan nama tabel jika tidak mengikuti konvensi Laravel (plural dari nama model).
     * Dalam kasus ini, 'Resident' -> 'residents', jadi sudah sesuai.
     */
    // protected $table = 'residents';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'wid',
        'nomor_sls',
        'nama_rt',
        'koordinat',
        'nama_desa',
        'kecamatan_id',
        'nama_kecamatan',
        'desa_id',
        'art_tani',
        'deskripsi',
        'nama_kepala_keluarga',
        'jumlah_kartu_keluarga',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'jumlah_meninggal',
        'nama_meninggal',
        'banyak_putus_sekolah',
        'nama_putus_sekolah',
        'banyak_disabilitas',
        'nama_disabilitas',
        'foto_url',
        'gambar_rumah_url',
        'pekerjaan_utama',
        'bahan_dinding',
        'bahan_lantai',
        'bahan_atap',
        'fasilitas_bab',
        'cara_buang_sampah',
        'petugas',
    ];
}
