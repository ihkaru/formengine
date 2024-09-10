<?php

use App\Models\RiwayatStatus;
use App\Models\Template;
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
        Schema::create('respondens', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('kegiatan_id');
            $table->foreign("kegiatan_id")->references('id')->on('kegiatans');
            $table->foreignIdFor(Template::class);
            $table->string("provinsi_id")->nullable();
            $table->string("kabkot_id")->nullable();
            $table->string("kecamatan_id")->nullable();
            $table->string("desa_id")->nullable();
            $table->string('sls_id')->nullable();
            $table->string('bs_id')->nullable();
            $table->unsignedBigInteger("last_riwayat_status")->nullable();
            // $table->foreign("last_riwayat_status")->references("id")->on("riwayat_statuses");

            $table->timestamp('terakhir_diisi')->nullable();
            $table->json('data');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedMediumInteger("jumlah_blank")->nullable();
            $table->unsignedMediumInteger("jumlah_error")->nullable();
            $table->unsignedMediumInteger("jumlah_warning")->nullable();
            $table->unsignedMediumInteger("jumlah_terisi")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respondens');
    }
};
