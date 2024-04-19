<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoBrand extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'toko_brand';

    protected $fillable = [
        'nama'
    ];
}
