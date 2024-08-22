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
        Schema::create('rincians', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('kegiatan_id');
            $table->foreign("kegiatan_id")->references('id')->on('kegiatans');
            $table->string('kode_blok');
            $table->string('nama_blok');
            $table->string('kode_subblok')->nullable();
            $table->string('nama_subblok')->nullable();
            $table->string('label');
            $table->string('jenis');
            $table->string('urutan_dalam_seksi');
            $table->string('helper');
            $table->string('ambil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rincians');
    }
};
