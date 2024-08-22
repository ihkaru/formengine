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
        Schema::create('opsis', function (Blueprint $table) {
            $table->string('id');
            $table->string('rincian_id');
            $table->foreign("rincian_id")->references('id')->on('rincians');
            $table->string('nilai');
            $table->string('label');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opsis');
    }
};
