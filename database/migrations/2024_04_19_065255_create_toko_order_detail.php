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
        Schema::create('toko_order_detail', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('toko_order_id')->nullable()->index();
            $table->string('produk')->nullable();
            $table->double('banyaknya')->nullable();
            $table->double('harga_satuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko_order_detail');
    }
};
