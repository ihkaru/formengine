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
        Schema::create('test_functions', function (Blueprint $table) {
            $table->id();
            $table->string('rincian_id');
            $table->foreign("rincian_id")->references('id')->on('rincians');
            $table->string('kegiatan_id');
            $table->foreign("kegiatan_id")->references('id')->on('kegiatans');
            $table->string('fungsi');
            $table->string('jenis');
            $table->string('invalid_helper');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_functions');
    }
};
