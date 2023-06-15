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
        Schema::create('admin__pembayaran__kategori_pembayarans', function (Blueprint $table) {
            $table->char('id')->primary();
            $table->string('kategori_pembayaran');
            $table->BigInteger('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pembayaran__kategori_pembayarans');
    }
};
