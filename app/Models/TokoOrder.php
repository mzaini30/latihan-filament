<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoOrder extends Model
{
    use HasFactory;
    protected $table = 'toko_order';
    protected $fillable = [
        'nomor',
        'customer',
        'status',
        'mata_uang',
        'harga_total',
        'ongkir',
        'tanggal_pemesanan'

    ];
}
