<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoKomentar extends Model
{
    use HasFactory;

    protected $table = 'toko_komentar';

    protected $fillable = [
        'toko_produk_id',


        'judul',

        'customer',
        'visibility',
        'konten'

    ];
}
