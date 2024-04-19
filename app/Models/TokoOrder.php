<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TokoOrder extends Model
{
    use HasFactory, HasUlids;
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
    public function orderDetail(): HasMany
    {
        return $this->hasMany(TokoOrderDetail::class);
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(TokoCustomer::class);
    }
    public function mataUang(): BelongsTo
    {
        return $this->belongsTo(MataUang::class);
    }
    public function negara(): BelongsTo
    {
        return $this->belongsTo(Negara::class);
    }
    public function produk(): BelongsTo
    {
        return $this->belongsTo(TokoProduk::class);
    }
}
