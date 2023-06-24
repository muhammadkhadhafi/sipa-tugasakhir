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
        Schema::create('admin__wisuda__pembayarans', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_mahasiswa', 36);
            $table->bigInteger('total_dibayar');
            $table->boolean('status')->default(false);
            $table->string('snap_token')->nullable();
            $table->timestamp('dibayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__wisuda__pembayarans');
    }
};
