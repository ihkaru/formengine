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
        Schema::create('assignments', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->uuid('pencacah_id');
            $table->string('responden_id');
            $table->string('kegiatan_id');
            $table->foreign("pencacah_id")->references('id')->on('users');
            $table->foreign("responden_id")->references('id')->on('respondens');
            $table->foreign("kegiatan_id")->references('id')->on('kegiatans');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
