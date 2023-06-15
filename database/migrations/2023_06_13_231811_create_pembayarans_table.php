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
        Schema::create('admin__pembayaran__pembayarans', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->char('id_mahasiswa');
            $table->char('id_kategoripembayaran');
            $table->enum('status', ['Unpaid', 'Paid']);
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pembayaran__pembayarans');
    }
};
