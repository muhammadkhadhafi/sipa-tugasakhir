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
        Schema::create('admin__ms__pegawai', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('nip')->unique();
            $table->string('foto')->nullable();
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->boolean('is_masterdata')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__ms__pegawai');
    }
};
