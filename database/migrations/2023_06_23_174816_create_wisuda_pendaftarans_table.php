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
        Schema::create('admin__wisuda__pendaftarans', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_mahasiswa', 36);
            $table->string('berkas_pendaftaran_wisuda');
            $table->integer('status');
            $table->text('deskripsi_pendaftaran_ditolak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__wisuda__pendaftarans');
    }
};
