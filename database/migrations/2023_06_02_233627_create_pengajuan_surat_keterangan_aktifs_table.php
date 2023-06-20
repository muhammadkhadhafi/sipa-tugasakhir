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
        Schema::create('admin__pengajuan_surat_keterangan_aktifs', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_mahasiswa', 36);
            $table->integer('semester');
            $table->string('no_hp');
            $table->string('nama_orang_tua');
            $table->string('pekerjaan_orang_tua');
            $table->text('deskripsi_pengajuan');
            $table->integer('status');
            $table->string('surat_keterangan_aktif')->nullable();
            $table->text('deskripsi_pengajuan_ditolak')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pengajuan_surat_keterangan_aktifs');
    }
};
