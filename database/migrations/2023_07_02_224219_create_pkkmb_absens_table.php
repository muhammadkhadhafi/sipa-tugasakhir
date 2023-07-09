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
        Schema::create('admin__pkkmb__absens', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_pkkmb_pertemuan')->nullable();
            $table->char('id_mahasiswa', 36)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pkkmb__absens');
    }
};
