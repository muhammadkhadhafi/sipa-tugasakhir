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
        Schema::create('admin__pkkmb__grups', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('prodi')->nullable();
            $table->integer('pkkmb_tahun')->nullable();
            $table->char('is_koor_1', 36)->nullable();
            $table->char('is_koor_2', 36)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pkkmb__grups');
    }
};
