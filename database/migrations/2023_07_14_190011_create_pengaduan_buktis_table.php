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
        Schema::create('admin__pengaduans__bukti', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_pengaduan', 36);
            $table->string('nama_bukti')->nullable();
            $table->string('file_bukti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pengaduans__bukti');
    }
};
