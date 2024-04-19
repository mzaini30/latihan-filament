<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TokoOrderDetail extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'toko_order_detail';
    protected $fillable = [
        'produk',
        'banyaknya',
        'harga_satuan'

    ];
    public function order(): BelongsTo
    {
        return $this->belongsTo(TokoOrderDetail::class);
    }
}
