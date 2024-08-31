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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id();
            $table->uuid('pencacah_id');
            $table->foreign("pencacah_id")->references('id')->on('users');
            $table->uuid('pengawas_id');
            $table->foreign("pengawas_id")->references('id')->on('users');
            $table->uuid('koseka_id');
            $table->foreign("koseka_id")->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
