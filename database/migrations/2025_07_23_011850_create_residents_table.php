<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id(); // Kunci utama auto-increment
            $table->string('wid')->unique(); // ID unik dari source data
            $table->string('nomor_sls')->nullable();
            $table->string('nama_rt')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('nama_desa')->nullable();
            $table->string('kecamatan_id')->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->string('desa_id')->nullable();
            $table->integer('art_tani')->default(0);
            $table->text('deskripsi')->nullable();
            $table->string('nama_kepala_keluarga')->nullable();
            $table->integer('jumlah_kartu_keluarga')->nullable();
            $table->integer('jumlah_laki_laki')->nullable();
            $table->integer('jumlah_perempuan')->nullable();
            $table->integer('jumlah_meninggal')->nullable();
            $table->text('nama_meninggal')->nullable();
            $table->integer('banyak_putus_sekolah')->nullable();
            $table->text('nama_putus_sekolah')->nullable();
            $table->integer('banyak_disabilitas')->nullable();
            $table->text('nama_disabilitas')->nullable();
            $table->text('foto_url')->nullable();
            $table->text('gambar_rumah_url')->nullable();
            $table->string('pekerjaan_utama')->nullable();
            $table->string('bahan_dinding')->nullable();
            $table->string('bahan_lantai')->nullable();
            $table->string('bahan_atap')->nullable();
            $table->string('fasilitas_bab')->nullable();
            $table->string('cara_buang_sampah')->nullable();
            $table->string('petugas')->nullable();
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
