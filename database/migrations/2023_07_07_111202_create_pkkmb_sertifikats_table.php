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
        Schema::create('admin__pkkmb__sertifikats', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('id_pkkmb_grup', 36);
            $table->string('sertifikat_pkkmb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pkkmb__sertifikats');
    }
};
