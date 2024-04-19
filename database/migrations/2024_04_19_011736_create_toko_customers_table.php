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
        Schema::create('toko_customer', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('negara')->nullable();
            $table->string('hp')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko_customer');
    }
};
