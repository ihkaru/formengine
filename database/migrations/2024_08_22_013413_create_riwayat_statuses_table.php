p<?php

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
            Schema::create('riwayat_statuses', function (Blueprint $table) {
                $table->string('id')->primary();
                $table->string('kegiatan_id');
                $table->foreign("kegiatan_id")->references('id')->on('kegiatans');
                $table->string('responden_id');
                $table->foreign("responden_id")->references('id')->on('respondens');
                $table->enum('status', [
                    'belum_dibuka',
                    'sudah_dibuka',
                    'pending',
                    'submitted_by_pencacah',
                    'rejected_by_pengawas',
                    'rejected_by_admin_level_1',
                    'rejected_by_admin_level_2',
                    'rejected_by_admin_level_3',
                    'approved_by_pengawas',
                    'approved_by_admin_level_1',
                    'approved_by_admin_level_2',
                    'approved_by_admin_level_3'
                ]);
                $table->string('user_id')->nullable();
                $table->foreign("user_id")->references('id')->on('users');
                $table->text('keterangan')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('riwayat_statuses');
        }
    };
