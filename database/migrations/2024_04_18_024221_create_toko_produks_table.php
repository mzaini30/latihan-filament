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
        Schema::create('toko_produk', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('brand_id')->nullable()->index();

            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->text('deskripsi')->nullable();

            $table->json('gambar')->nullable();

            $table->double('harga_beli')->nullable();
            $table->double('harga_jual')->nullable();

            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('banyak')->nullable();
            $table->integer('batas_stok_aman')->nullable();

            $table->boolean('pengiriman_bisa_dikembalikan')->nullable();
            $table->boolean('pengiriman_mau_dikirim')->nullable();


            $table->boolean('visibility')->nullable();
            $table->date('tersedia_sampai')->nullable();

            $table->timestamps();
        });
        Schema::create('toko_brand', function (Blueprint $table) {

            $table->ulid('id')->primary();

            $table->string('nama')->nullable();

            $table->timestamps();
        });
        Schema::create('produk_kategori', function (Blueprint $table) {
            $table->foreignUlid('toko_produk_id')->index();
            $table->foreignUlid('toko_kategori_id')->index();
        });
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
        Schema::dropIfExists('toko_produk');
        Schema::dropIfExists('toko_brand');
        Schema::dropIfExists('produk_kategori');
        Schema::dropIfExists('toko_komentar');
    }
};
