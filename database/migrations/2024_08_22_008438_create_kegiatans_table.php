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
            $table->timestamp('tgl_mulai_lapangan')->nullable()->default(null);
            $table->timestamp('tgl_selesai_lapangan')->nullable()->default(null);
            $table->timestamp('tgl_tutup_kegiatan')->nullable()->default(null);
            $table->string('level_rekap_1');
            $table->string('level_rekap_2');
            $table->string('level_assignment');
            $table->string('unit_observasi');
            $table->string('unit_sampel');
            $table->unsignedMediumInteger('tahun');
            $table->string('frekuensi');
            $table->string('seri');
            $table->string('subkategori')->nullable();
            $table->string('kode_subkategori')->nullable();
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
