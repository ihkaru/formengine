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
        Schema::create('wilayah_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string("petugas_level_1_id");
            $table->foreign("petugas_level_1_id")->references("id")->on("users");
            $table->string("kegiatan_id");
            $table->foreign("kegiatan_id")->references("id")->on("kegiatans");
            $table->string("prov_id");
            $table->string("kabkot_id")->nullable();
            $table->string("kec_id")->nullable();
            $table->string("desa_kel_id")->nullable();
            $table->string("sls_id")->nullable();
            $table->string("bs_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_kerjas');
    }
};
