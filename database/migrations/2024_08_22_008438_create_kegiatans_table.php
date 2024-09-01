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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama');
            $table->timestamp('tgl_mulai')->nullable()->default(null);
            $table->timestamp('tgl_selesai')->nullable()->default(null);
            $table->timestamp('tgl_tutup')->nullable()->default(null);
            $table->string('level_rekap_1');
            $table->string('level_rekap_2');
            $table->string('level_assignment');
            $table->string('unit_observasi');
            $table->string('unit_sampel');
            $table->unsignedMediumInteger('tahun');
            $table->string("level_pendataan");
            $table->string('frekuensi');
            $table->string('seri');
            $table->string('subkategori')->nullable();
            $table->string('kode_subkategori')->nullable();
            $table->string("petugas_level_1");
            $table->string("petugas_level_2")->nullable();
            $table->string("petugas_level_3")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
