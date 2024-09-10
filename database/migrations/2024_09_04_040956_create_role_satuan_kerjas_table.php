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
        Schema::create('role_satuan_kerjas', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->foreign('user_id')->references("id")->on("users");
            $table->string("kegiatan_id");
            $table->foreign("kegiatan_id")->references("id")->on("kegiatans");
            $table->string("role");
            $table->string('satuan_kerja_id');
            $table->foreign('satuan_kerja_id')->references("id")->on("satuan_kerjas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_satuan_kerjas');
    }
};
