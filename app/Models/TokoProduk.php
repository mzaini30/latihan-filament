<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoProduk extends Model
{
    use HasFactory;

    protected $table = 'toko_produk';

    protected $fillable = [
        'brand_id',

        'nama',
        'slug',
        'deskripsi',

        'gambar',

        'harga_beli',
        'harga_jual',

        'sku',
        'barcode',
        'banyak',
        'batas_stok_aman',

        'pengiriman_bisa_dikembalikan',
        'pengiriman_mau_dikirim',


        'visibility',
        'tersedia_sampai'

    ];
}
