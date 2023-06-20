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
        Schema::create('admin__pengaduan', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_mahasiswa', 36);
            $table->string('judul_pengaduan')->nullable();
            $table->text('deskripsi_pengaduan')->nullable();
            $table->string('nama_bukti_pengaduan')->nullable();
            $table->string('file_bukti_pengaduan')->nullable();
            $table->integer('status');
            $table->text('deskripsi_tindak_lanjut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pengaduan');
    }
};
