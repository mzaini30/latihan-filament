<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoKomentar extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'toko_komentar';

    protected $fillable = [
        'toko_produk_id',


        'judul',

        'customer',
        'visibility',
        'konten'

    ];
}
