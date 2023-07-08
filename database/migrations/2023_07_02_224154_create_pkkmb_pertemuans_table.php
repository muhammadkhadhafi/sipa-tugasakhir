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
        Schema::create('admin__pkkmb__pertemuans', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_pkkmb_grup', 36)->nullable();
            $table->string('materi_kegiatan')->nullable();
            $table->string('bukti_kegiatan')->nullable();
            $table->timestamp('tanggal_pertemuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pkkmb__pertemuans');
    }
};
