<?php

use App\Models\Kegiatan;
use App\Models\Master;
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
        Schema::create('master_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string("master_id");
            $table->string("kegiatan_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kegiatan');
    }
};
