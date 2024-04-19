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
        Schema::create('toko_komentar', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('toko_produk_id')->nullable()->index();

            $table->string('judul')->nullable();
            $table->string('customer')->nullable();
            $table->boolean('visibility')->nullable();
            $table->text('konten')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko_komentar');
    }
};
