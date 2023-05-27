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
        Schema::create('admin__pegawai', function (Blueprint $table) {
            $table->char('id', 36);
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('nip')->unique();
            $table->string('password');
            $table->string('foto')->nullable();
            $table->string('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin__pegawai');
    }
};
